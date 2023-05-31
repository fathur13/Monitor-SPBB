<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('sensor_data')->insert([
            [
                'sensor_name' => 'Sensor 1',
                'latitude' => -6.214620,
                'longitude' => 106.845130,
                'value' => 23.5,
                'timestamp' => '2022-05-02 15:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sensor_name' => 'Sensor 2',
                'latitude' => -6.217600,
                'longitude' => 106.844220,
                'value' => 18.9,
                'timestamp' => '2022-05-02 16:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sensor_name' => 'Sensor 3',
                'latitude' => -6.214830,
                'longitude' => 106.846350,
                'value' => 29.1,
                'timestamp' => '2022-05-02 17:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
