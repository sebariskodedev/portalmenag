<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getInformasiBantuan()
    {

        return view('bantuan-informasi');
    }
    /**
     * Display a listing of the resource.
     */
    public function getBantuanTersalurkan()
    {

        return view('bantuan-tersalurkan');
    }
}
