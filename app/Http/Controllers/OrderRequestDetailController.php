<?php

namespace App\Http\Controllers;
use App\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderRequestDetailController extends Controller
{
    public function index()
    {
       
        $requtestDetails = DB::select("select u.id user_id, u.first_name, u.last_name, u.email, u.status, u.department_id userDepartment,
                                        d.id departmentId, d.name departmentName, d.code,
                                        o.id orderRequestId, o.department_id orderDepartmentId, o.request_user_id orderRequestUserId,o.approved_user_id orderApprovedUserId, o.status orderStatus, o.remark_admin, o.remark_staff
                                        from order_requests o
                                        INNER JOIN departments d
                                        on o.department_id = d.id
                                        INNER JOIN users u
                                        on o.request_user_id = u.id
                                        ORDER BY o.id DESC"
                                    );
            // return $requtestDetails;
        
        
        return view('admin.layouts.mainpage', ['requtestDetails' => $requtestDetails]);
    }

    public function show($id)
    {
        if (OrderRequest::where("id", $id)->exists()) { 
            //  DB::enableQueryLog();
            $order_request = DB::select("Select u.id as user_id,u.first_name,u.last_name,d.id as department_id,
                                        d.name as department_name,o.id as order_request_id, o.remark_staff,o.remark_admin, o.status
                                        From users u                                       
                                        INNER JOIN order_requests o
                                        on u.id = o.request_user_id
                                        INNER JOIN departments d
                                        on o.department_id = d.id
                                        where o.id= ?", [$id]);
            // dd(DB::getQueryLog());
            $item_order= $order_request[0]->order_request_id;

            $req_item_order = DB::select('select s.item,s.code_no,ort.order_request_id, ort.stationary_id, ort.qty 
                                          from order_request_items ort
                                          INNER JOIN stationarys s
                                          on ort.stationary_id = s.id
                                          where order_request_id = ?', [$item_order]);
            return view('admin.layouts.master', ['order_request' => $order_request, 'req_item_order'=> $req_item_order]);
        }   
    }

    public function approve(Request $request, $id)
    {
        if (OrderRequest::where("id", $id)->exists()) {
            $order_req = OrderRequest::find($id);
            // dd($request->status);
            $order_req->status = (!empty($request->status)) ? $request->status: $order_req->status;
            // DB::enableQueryLog();
            $order_req->save();
            // dd(DB::getQueryLog());
            return redirect()->route('order_request_details')->with('success', 'Stationary Approved Successfully');
           
        }
    }

    public function reject(Request $request, $id)
    {
        if(OrderRequest::where("id", $id)->exists()) {
            $order_req = OrderRequest::find($id);
            
            $order_req->status = (!empty($request->status)) ? $request->status: $order_req->status;
            // dd($order_req->status);
            $order_req->update();
            return redirect()->route('order_request_details')->with('success', 'Stationary Reject Successfully');
        }
    }
}
