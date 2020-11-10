<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    use HasFactory;

    public function makanans()
    {
        return $this->belongsToMany('App\Models\Makanan', 'makanan_pemesan', 'pemesan_id', 'makanan_id');
    }

    public function akunwifis()
    {
        return $this->hasMany('App\Models\AkunWifi', 'pemesan_id', 'id');
    }
}
