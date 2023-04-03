<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sensor extends Model
{
    protected $table = 'sensor';

    public static function getMonthlyData()
    {
        return self::selectRaw('MONTH(created_at) as month, AVG(suhu) as suhu_avg, AVG(kelembapan) as kelembapan_avg')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
    }}
