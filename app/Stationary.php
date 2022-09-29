<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stationary extends Model
{
    protected $fillable = [
        'code_no', 'item', 'item_indented', 'quantity_issued', 'user_id'
    ];

    protected $table = 'stationarys';
}
