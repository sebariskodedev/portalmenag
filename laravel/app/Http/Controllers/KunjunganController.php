<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\KlikLayanan;
use App\Models\KlikData;
use App\Models\KlikBantuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Exports\KunjunganExport;
use App\Exports\SomeKunjunganExport;
use Maatwebsite\Excel\Facades\Excel;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kunjungan()
    {
        $pengunjungs = Kunjungan::orderBy('id', 'asc')->get();

        return view('dashboard.pengunjung.website', [
            'pengunjungs' => $pengunjungs
        ]);
    }

    public function exportCsv()
    {
        return Excel::download(new KunjunganExport, 'pengunjung_website_export.csv');
    }

    public function exportCsvToday()
    {
        $today = Kunjungan::whereDate('created_at', Carbon::today())->get();

        return Excel::download(new SomeKunjunganExport($today), 'today_count.csv');
    }

    public function exportCsvWeek()
    {
        $week = Kunjungan::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();

        return Excel::download(new SomeKunjunganExport($week), 'week_count.csv');
    }

    public function exportCsvMonth()
    {
        $month = Kunjungan::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();

        return Excel::download(new SomeKunjunganExport($month), 'month_count.csv');
    }

    public function exportCsvYear()
    {
        $year = Kunjungan::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();

        return Excel::download(new SomeKunjunganExport($year), 'year_count.csv');
    }
    /**
     * Display a listing of the resource.
     */
    public function get()
    {
        $kunjungans = Kunjungan::count();
        
        return response()->json(['kunjungans' => $kunjungans]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request)
    {
        
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'ip' => 'required'
        ]);
    
        $kunjungan = Kunjungan::create([
            'ip' => $request->ip, // Store the client's IP
        ]);
    
        return response()->json([
            'kunjungan' => $kunjungan
        ]);
    }

    public function getMonthlyCounts()
    {
        // Initialize an empty array for results
        $dataCounts = [];

        // Loop through the last 5 months
        for ($i = 4; $i >= 0; $i--) {
            $startOfMonth = Carbon::now()->subMonths($i)->startOfMonth();
            $endOfMonth = Carbon::now()->subMonths($i)->endOfMonth();

            $dataCounts[] = [
                'month' => $startOfMonth->format('F d, Y'), // e.g., "January 2024"
                'kunjungan' => Kunjungan::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
                'layananKlik' => KlikLayanan::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
                'dataKlik' => KlikData::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
                'bantuanKlik' => KlikBantuan::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
            ];
        }

        // Return the data as a JSON response
        return response()->json($dataCounts);
    }
}
