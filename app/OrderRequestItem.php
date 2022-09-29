<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRequestItem extends Model
{
    protected $fillable = [
        'order_request_id', 'stationary_id', 'qty'
    ];

    protected $table = 'order_request_items';
}
