<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MimbarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getMimbarTerbaru()
    {

        return view('mimbar-terbaru');
    }
}
