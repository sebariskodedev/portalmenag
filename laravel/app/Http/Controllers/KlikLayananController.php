<?php

namespace App\Http\Controllers;

use App\Models\KlikLayanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Exports\KlikLayananExport;
use Maatwebsite\Excel\Facades\Excel;

class KlikLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kunjungan()
    {
        $pengunjungs = KlikLayanan::orderBy('id', 'asc')->get();

        return view('dashboard.pengunjung.layanan', [
            'pengunjungs' => $pengunjungs
        ]);
    }

    public function exportCsv()
    {
        return Excel::download(new KlikLayananExport, 'pengunjung_layanan_export.csv');
    }
    /**
     * Display a listing of the resource.
     */
    public function get()
    {
        $kliks = KlikLayanan::count();
        
        return response()->json(['kliks' => $kliks]);
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
    
        $kliks = KlikLayanan::create([
            'ip' => $request->ip, // Store the client's IP
        ]);
    
        return response()->json([
            'kliks' => $kliks
        ]);
    }
}
