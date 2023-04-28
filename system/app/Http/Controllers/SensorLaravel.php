<?php

namespace App\Http\Controllers;

use App\Models\MSensor;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SensorLaravel extends Controller
{
    public function index()
    {
        $dailyData = MSensor::getDailyData();
        $sensor = MSensor::all()->take(1);

        return view('index', compact('dailyData', 'sensor'));
    }
    public function apiChart()
    {
        $data = DB::table('sensor')->latest()->first();
        return response()->json([
            'created_at' => $data->created_at,
            'kelembapan_sinyal' => $data->kelembapan,
            'suhu' => $data->suhu
        ]);
    }
    public function getKIDStatus()
    {
        // Mengambil data terbaru dari database
        $latestData = MSensor::orderBy('created_at', 'desc')->first();

        // Mengecek ketinggian air dan menentukan status dan warna background
        if ($latestData->ketinggian_air < 10) {
            $status = "Tenggelam"; // Jika ketinggian air < 10 cm, status menjadi "Tenggelam"
            $color = "danger"; // Background menjadi merah
        } else if ($latestData->ketinggian_air < 100) {
            $status = "Banjir"; // Jika ketinggian air < 50 cm, status menjadi "banjir"
            $color = "warning"; // Background menjadi kuning
        } else if ($latestData->ketinggian_air < 150) {
            $status = "Siaga"; // Jika ketinggian air < 100 cm, status menjadi "Hati-hati"
            $color = "warning"; // Background menjadi kuning
        } else if ($latestData->ketinggian_air < 200) {
            $status = "Waspada"; // Jika ketinggian air < 200 cm, status menjadi "Siaga"
            $color = "info"; // Background menjadi biru
        } else {
            $status = "Aman"; // Jika ketinggian air >= 200 cm, status menjadi "Aman"
            $color = "success"; // Background menjadi hijau
        }

        // Mengembalikan data dalam bentuk JSON
        return response()->json([
            'status' => $status,
            'color' => $color,
            'ketinggian_air' => $latestData->ketinggian_air
        ]);
    }

    public function bacasuhu(MSensor $sensor): View
    {
        return view('sensor.bacasuhu', ['nilaisensor' => $sensor->latest()->paginate(1)]);
    }
    public function bacacuaca(MSensor $sensor): View
    {
        return view('sensor.bacacuaca', ['nilaisensor' => $sensor->latest()->paginate(1)]);
    }
    public function bacakelembapan(MSensor $sensor): View
    {
        return view('sensor.bacakelembapan', ['nilaisensor' => $sensor->latest()->paginate(1)]);
    }
    
    public function simpansensor()
    {
        MSensor::where('id', '321')->update(['suhu' => request()->nilaisuhu, 'kelembapan' => request()->nilaikelembapan]);
    }
}
