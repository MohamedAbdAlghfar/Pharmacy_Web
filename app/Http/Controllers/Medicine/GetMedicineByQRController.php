<?php

namespace App\Http\Controllers\Medicine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Photo;

class GetMedicineByQRController extends Controller
{
    public function index($QR_code)
    {

       $medicine = Medicine::where('qr_code', $QR_code)->first();

       if (!$medicine) {
        return response()->json(['error' => 'Medicine not found'], 404);
    }

        return response()->json($medicine);



    }






}
