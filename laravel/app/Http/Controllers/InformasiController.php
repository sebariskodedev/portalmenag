<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getInformasiTerbaru()
    {

        return view('informasi-terbaru');
    }
    /**
     * Display a listing of the resource.
     */
    public function getInformasi()
    {

        return view('article-page');
    }
}
