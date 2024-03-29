<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'name',
        'description',  
        'qr_code',
        'price',
        'type',
        'company_name',
        
    ];


    public function Photo() 
    {
        return $this->morphOne('App\Models\Photo', 'photoable');
    }

    public function Pharmacies() {
        return $this->belongsToMany('App\Models\Pharmacy');
    }

    public function Orders()
    {
        return $this->hasMany('App\Models\Order');
    }



}
