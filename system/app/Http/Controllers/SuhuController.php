<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuhuController extends Controller
{
    public function index()
    {
        return view('suhu');
    }
    public function apiChart()
    {
        $data = DB::table('sensor')->latest()->first();
        return response()->json([
            'created_at' => $data->created_at,
            'suhu' => $data->suhu
        ]);
    }
}
