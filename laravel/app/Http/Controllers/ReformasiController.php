<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('reformasi-birokrasi');
    }

    public function action($id)
    {
        // Process the parameter
        return view('reformasi-birokrasi-action');
    }

    public function getJsonRB()
    {
        // Generate dummy data
        $data = [
            [
                'title' => 'Laporan Capaian Kinerja Ditjen Bimas Katolik Triwulan III 2024',
                'time' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Laporan Capaian Kinerja Ditjen Bimas Katolik Triwulan II 2024',
                'time' => now()->addHour()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Laporan Capaian Kinerja Ditjen Bimas Katolik Triwulan I 2024',
                'time' => now()->addHour()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Laporan Kinerja Tahun 2023',
                'time' => now()->addHours(2)->format('Y-m-d H:i:s'),
            ],
        ];

        // Return JSON response
        return response()->json(['results' => $data]);
    }

    public function actionChild($id)
    {
        // Process the parameter
        return view('reformasi-birokrasi-action-child');
    }
}
