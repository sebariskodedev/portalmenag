<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KunjunganController extends Controller
{
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
}
