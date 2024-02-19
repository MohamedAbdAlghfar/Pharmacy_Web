<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicinePharmacy extends Model
{
    protected $table = 'medicine_pharmacy';
    protected $fillable = ['N_of_pieces', 'buy']; // Allow mass assignment of these fields

    // Define relationship with Medicine
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    // Define relationship with Pharmacy
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class); 
    }
}
