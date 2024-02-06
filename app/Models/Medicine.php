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
        'N_of_pieces',
        'type',
    ];


    public function photo() 
    {
        return $this->morphOne('App\Models\Photo', 'photoable');
    }

    public function pharmacies() {
        return $this->belongsToMany('App\Models\Pharmacy');
    }



}
