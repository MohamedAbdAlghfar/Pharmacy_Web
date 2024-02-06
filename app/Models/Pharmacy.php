<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'buy',
        'address',
        'phone',
        'user_id',
    ];

    public function photo() 
    {
        return $this->morphOne('App\Models\Photo', 'photoable');
    }

    public function medicines() {
        return $this->belongsToMany('App\Models\Medicine');
    }


}
