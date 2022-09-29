<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuantityController extends Controller
{
    public function index()
    {
        $data = DB::table('stationarys')->get();
        return view('admin.order_request')->with('data', $data);
    }

    public function getRemainQty($id)
    {
        
    }
}


