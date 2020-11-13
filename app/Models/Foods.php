<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function orders()
    {
        return $this->belongsToMany('App\Models\Orders', 'food_order', 'food_id', 'order_id');
    }
}
