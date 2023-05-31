<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelembapanController extends Controller
{
    public function index()
    {
        return view('kelembapan');
    }

    public function apiChart()
    {
        $data = DB::table('sensor')->latest()->first();
        return response()->json([
            'created_at' => $data->created_at,
            'kelembapan' => $data->kelembapan
        ]);
    }
}
