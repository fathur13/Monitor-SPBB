<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiPostController extends Controller
{
    // function index(Request $data)
    // {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return view('test');
    // }
    public function storeOrUpdate(Request $request)
    {
        $sensor = trim($request->sensor);
        $location = trim($request->location);
        $suhu = trim($request->value1);
        $kelembapan  = trim($request->value2);
        $ketinggian_air  = trim($request->value3);
        $status_air = trim($request->value4);

        $existingData = DB::table('sensor')
            ->where('sensor', $sensor)
            ->where('location', $location)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$existingData) {
            // Jika tidak ada data, simpan data baru
            DB::table('sensor')->insert([
                'sensor' => $sensor,
                'location' => $location,
                'suhu' => $suhu,
                'kelembapan' => $kelembapan,
                'ketinggian_air' => $ketinggian_air,
                'status_air' => $status_air,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            // Jika ada data, periksa waktu pembuatan terakhir
            $lastCreated = strtotime($existingData->created_at);
            $now = strtotime(now());
            $diffInSeconds = $now - $lastCreated;

            if ($diffInSeconds < 3600) {
                // Jika data masih kurang dari 1 jam, lakukan update fieldnya saja
                DB::table('sensor')
                    ->where('id', $existingData->id)
                    ->update([
                        'suhu' => $suhu,
                        'kelembapan' => $kelembapan,
                        'ketinggian_air' => $ketinggian_air,
                        'status_air' => $status_air,
                        'updated_at' => now(),
                    ]);
            } else {
                // Jika data sudah lebih dari 1 jam, simpan data baru
                DB::table('sensor')->insert([
                    'sensor' => $sensor,
                    'location' => $location,
                    'suhu' => $suhu,
                    'kelembapan' => $kelembapan,
                    'ketinggian_air' => $ketinggian_air,
                    'status_air' => $status_air,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return response()->json(['success' => true]);
    }
}
