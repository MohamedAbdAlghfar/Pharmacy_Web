<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'price', 
        'medicine_id',  
        'pharmacy_id',  

    ];

    public function Medicine()
    {
     return $this->belongsTo('App\Models\Medicine');
    }





}
