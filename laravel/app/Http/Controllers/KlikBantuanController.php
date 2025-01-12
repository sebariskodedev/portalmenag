<?php

namespace App\Http\Controllers;

use App\Models\KlikBantuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Exports\KlikBantuanExport;
use Maatwebsite\Excel\Facades\Excel;

class KlikBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kunjungan()
    {
        $pengunjungs = KlikBantuan::orderBy('id', 'asc')->get();

        return view('dashboard.pengunjung.bantuan', [
            'pengunjungs' => $pengunjungs
        ]);
    }

    public function exportCsv()
    {
        return Excel::download(new KlikBantuanExport, 'pengunjung_bantuan_export.csv');
    }
    /**
     * Display a listing of the resource.
     */
    public function get()
    {
        $kliks = KlikBantuan::count();
        
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
    
        $kliks = KlikBantuan::create([
            'ip' => $request->ip, // Store the client's IP
        ]);
    
        return response()->json([
            'kliks' => $kliks
        ]);
    }
}
