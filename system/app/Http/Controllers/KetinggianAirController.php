<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KetinggianAirController extends Controller
{
    public function index()
    {
        return view('ketinggian_air');
    }

    public function charthari()
    {
        $data = DB::table('sensor')->orderBy('created_at', 'asc')->get();
        return response()->json($data);
    }

    public function apiChart()
    {
        $data = DB::table('sensor')->latest()->first();
        return response()->json([
            'created_at' => $data->created_at,
            'ketinggian_air' => $data->ketinggian_air,
            'suhu' => $data->suhu,
        ]);
    }

    // public function showLatest()
    // {
    //     $latestData = SensorData::orderBy('timestamp', 'desc')->first();
    //     return view('map', compact('latestData'));
    // }
}
