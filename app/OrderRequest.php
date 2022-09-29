<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRequest extends Model
{
    protected $fillable = [
        'department_id', 'request_user_id', 'approved_user_id', 'status', 'remark_staff', 'remark_admin'
    ];

    protected $table = 'order_requests';
}
