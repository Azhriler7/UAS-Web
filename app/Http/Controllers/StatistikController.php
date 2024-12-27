<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;

class StatistikController extends Controller
{
    public function index()
    {
        // Fetch Daily Statistics
        $dailyStats = Pengunjung::selectRaw('DATE(tgl_kunjungan) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Fetch Weekly Statistics
        $weeklyStats = Pengunjung::selectRaw('YEARWEEK(tgl_kunjungan, 1) as week, COUNT(*) as count')
            ->groupBy('week')
            ->orderBy('week', 'ASC')
            ->get();

        // Debugging: Ensure data is being passed
        // dd($dailyStats, $weeklyStats);

        return view('statistik.index', compact('dailyStats', 'weeklyStats'));
    }
}