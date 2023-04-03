<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\MSensor;
use App\Models\sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiSensorController extends Controller
{
    public function suhu()


    {

        return response()->json([
            'data'      => MSensor::first()->suhu
        ], 200);

        // $data = MSensor::latest()->get();
        // return response($data);
    }
}
