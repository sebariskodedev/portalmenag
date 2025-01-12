<?php

namespace App\Http\Controllers;

use App\Models\KlikData;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Exports\KlikDataExport;
use Maatwebsite\Excel\Facades\Excel;

class KlikDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kunjungan()
    {
        $pengunjungs = KlikData::orderBy('id', 'asc')->get();

        return view('dashboard.pengunjung.data', [
            'pengunjungs' => $pengunjungs
        ]);
    }

    public function exportCsv()
    {
        return Excel::download(new KlikDataExport, 'pengunjung_data_export.csv');
    }
    /**
     * Display a listing of the resource.
     */
    public function get()
    {
        $kliks = KlikData::count();
        
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
    
        $kliks = KlikData::create([
            'ip' => $request->ip, // Store the client's IP
        ]);
    
        return response()->json([
            'kliks' => $kliks
        ]);
    }
}
