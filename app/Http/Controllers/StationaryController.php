<?php

namespace App\Http\Controllers;

use App\Stationary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StationaryController extends Controller
{
    public function index()
    {
        $stationarys = Stationary::orderBy('id', 'DESC')->get();

        return view('admin.layouts.master', ['stationarys' => $stationarys]);
    }

    public function store(Request $request)
    {
        // dd('hiii');
        // validation
        $this->validate($request, [
            'code_no' => 'required',
            'item' => 'required',
            'item_indented' => 'required',
            'quantity_issued' => 'required',
            'user_id' => 'required'
        ]);
        // create stationarys
        Stationary::create([
            'code_no' => $request->code_no,
            'item' => $request->item,
            'item_indented' => $request->item_indented,
            'quantity_issued' => $request->quantity_issued,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('stationary')->with('success', 'Stationary insert successfully');
    }

    public function getSingleStationary($id)
    {
        if (Stationary::where("id", $id)->exists()) {
            $stationary_detail = Stationary::where("id", $id)->first();
            return view('admin.layouts.master', ['stationary_detail' => $stationary_detail]);
        }
    }

    public function updateStationary(Request $request, $id)
    {

        // dd($request);
        if (Stationary::where("id", $id)->exists()) {
            $stationary = Stationary::find($id);
            $stationary->code_no = (!empty($request->code_no)) ? $request->code_no : $stationary->code_no;
            $stationary->item = (!empty($request->item)) ? $request->item : $stationary->item;
            $stationary->item_indented = (!empty($request->item_indented)) ? $request->item_indented : $stationary->item_indented;
            $stationary->quantity_issued = (!empty($request->quantity_issued)) ? $request->quantity_issued : $stationary->quantity_issued;
            $stationary->update();
            return redirect()->route('stationary')->with('success', 'Stationary updated successfully');
        }
    }

    public function destroy($id)
    {
        $stationary = Stationary::find($id);
        $stationary->delete();
        return redirect('/stationary')->with('success', 'Stationary Delete successfully');
    }
}
