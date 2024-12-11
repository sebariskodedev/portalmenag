<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('informasi-regulasi');
    }

    public function getJsonRegulasi()
    {
        // Generate dummy data
        $data = [
            [
                'title' => 'Standard Pelayanan Direktorat Urusan Katolik',
                'time' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Standard Pelayanan Subdirektorat Pendidikan Tinggi Katolik',
                'time' => now()->addHour()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Standard Pelayanan Subdirektorat Pendidikan Menengah Katolik',
                'time' => now()->addHours(2)->format('Y-m-d H:i:s'),
            ],
        ];

        // Return JSON response
        return response()->json(['results' => $data]);
    }

    public function getJsonInformasi()
    {
        // Generate dummy data
        $data = [
            [
                'title' => 'Standard Pelayanan Direktorat Urusan Katolik',
                'time' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Standard Pelayanan Subdirektorat Pendidikan Tinggi Katolik',
                'time' => now()->addHour()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Standard Pelayanan Subdirektorat Pendidikan Menengah Katolik',
                'time' => now()->addHours(2)->format('Y-m-d H:i:s'),
            ],
        ];

        // Return JSON response
        return response()->json(['results' => $data]);
    }

    public function getInfoRegulasi($kategori, $id)
    {
        // Process the parameter
        return view('informasi-regulasi-action');
    }
}
