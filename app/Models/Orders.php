<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    // This Class has relationship to foods table
    public function foods()
    {
        // cs pivot table has more atribute, must using method withPivot
        return $this->belongsToMany('App\Models\Foods', 'food_order', 'order_id', 'food_id')->withPivot('total');
    }

    public function wifiAccounts()
    {
        return $this->hasMany('App\Models\WifiAccounts', 'id', 'order_id');
    }
}
