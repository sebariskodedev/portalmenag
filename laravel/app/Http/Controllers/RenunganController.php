<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RenunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getRenunganTerbaru()
    {

        return view('renungan-terbaru');
    }
}
