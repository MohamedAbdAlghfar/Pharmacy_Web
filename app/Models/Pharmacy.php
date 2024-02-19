<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'name', 
        'address',
        'phone',
        'user_id',  
    ];

    public function Photo() 
    {
        return $this->morphOne('App\Models\Photo', 'photoable');
    }

    public function Medicines() {
        return $this->belongsToMany('App\Models\Medicine'); 
    }

    public function User()
    {
     return $this->belongsTo('App\Models\User');
    }

    public function Orders()
    {
        return $this->hasMany('App\Models\Order');
    }

}
