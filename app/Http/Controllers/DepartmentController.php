<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('id', 'DESC')->get();

        return view('admin.layouts.master', ['departments' => $departments]);
    }

    public function store(Request $request)
    {
        // dd('hiii');
        // validation
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',

        ]);
        // create stationarys
        Department::create([
            'code' => $request->code,
            'name' => $request->name,
            'user_id' => 1
        ]);

        return redirect()->route('department')->with('success', 'Department insert successfully');
    }

    public function getSingleDepartment($id)
    {
        if (Department::where("id", $id)->exists()) {
            $department_detail = Department::where("id", $id)->first();
            return view('admin.layouts.master', ['department_detail' => $department_detail]);
        }
    }

    public function updateDepartment(Request $request, $id)
    {

        // dd($request);
        if (Department::where("id", $id)->exists()) {
            $department = Department::find($id);
            $department->code = (!empty($request->code)) ? $request->code : $department->code;
            $department->name = (!empty($request->name)) ? $request->name : $department->name;            
            $department->update();
            return redirect()->route('department')->with('success', 'Department updated successfully');
        }
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect('/department')->with('success', 'Department Delete successfully');
    }
}
