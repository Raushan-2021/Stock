<?php

namespace App\Http\Controllers;
use App\OrderRequest;
use Illuminate\Http\Request;
use App\Department;
use App\Stationary;
use App\OrderRequestItem;
use Illuminate\Support\Facades\DB;
class OrderRequestController extends Controller
{
     public function index()
    {
        $departments = Department::all();
        $stationary  = Stationary::all(); 
        return view('admin.layouts.mainpage', ['departments' => $departments, 'stationary' => $stationary]);
    }
public function request_form()
{
  return view('admin.canteen_form1');




}
    public function store(Request $request)
    {
       $data = $request->all();
      //  get last id 
       $lastid = OrderRequest::create($data)->id;
       if(count($request->item) > 0) {
          foreach($request->item as $item=>$v){
            $data2 = array(
                'order_request_id'  => $lastid,  
                'stationary_id' => $request->item[$item],
                'qty' => $request->quantity[$item] 
            );
            $subStationary = Stationary::where('id', $request->item[$item])->get();                   
            // Remaing qty
            $stationaryqty = $subStationary[0]['quantity_issued'] - $request->quantity[$item];
            Stationary::where('id',$request->item[$item])->update(['quantity_issued'=>$stationaryqty]);
            OrderRequestItem::insert($data2);
          }
        return redirect()->back()->with('success', 'Data insert successfully');
      }
    }
}
