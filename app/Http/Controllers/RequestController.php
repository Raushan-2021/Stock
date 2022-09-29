<?php

namespace App\Http\Controllers;

use App\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RequestController extends Controller
{
    public function approvedRequest()
    {
        $valapprove = DB::select("select u.id user_id, u.first_name, u.last_name, u.email, u.status, u.department_id userDepartment,
                                    d.id departmentId, d.name departmentName, d.code,
                                    o.id orderRequestId, o.department_id orderDepartmentId, o.request_user_id orderRequestUserId,o.approved_user_id orderApprovedUserId, o.status orderStatus, o.remark_admin, o.remark_staff
                                    from order_requests o
                                    INNER JOIN departments d
                                    on o.department_id = d.id
                                    INNER JOIN users u
                                    on o.request_user_id = u.id
                                    WHERE o.status = 'APPROVED'"
                                );
        // return $valapprove;
        return view('admin.layouts.master', ['approved'=> $valapprove]);
    }
    public function pendingRequest()
    {
        $valpending = DB::select("select u.id user_id, u.first_name, u.last_name, u.email, u.status, u.department_id userDepartment,
                                    d.id departmentId, d.name departmentName, d.code,
                                    o.id orderRequestId, o.department_id orderDepartmentId, o.request_user_id orderRequestUserId,o.approved_user_id orderApprovedUserId, o.status orderStatus, o.remark_admin, o.remark_staff
                                    from order_requests o
                                    INNER JOIN departments d
                                    on o.department_id = d.id
                                    INNER JOIN users u
                                    on o.request_user_id = u.id
                                    WHERE o.status = 'PENDING'"
                                );
        return view('admin.layouts.master', ['pending'=> $valpending]);
    }
    public function rejectRequest()
    {
        $valreject = DB::select("select u.id user_id, u.first_name, u.last_name, u.email, u.status, u.department_id userDepartment,
                                d.id departmentId, d.name departmentName, d.code,
                                o.id orderRequestId, o.department_id orderDepartmentId, o.request_user_id orderRequestUserId,o.approved_user_id orderApprovedUserId, o.status orderStatus, o.remark_admin, o.remark_staff
                                from order_requests o
                                INNER JOIN departments d
                                on o.department_id = d.id
                                INNER JOIN users u
                                on o.request_user_id = u.id
                                WHERE o.status = 'REJECT'"
                            );
        return view('admin.layouts.master', ['reject'=> $valreject]);
    }
}