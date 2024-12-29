<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Renungan;
use App\Models\Mimbar;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Informasi::orderBy('id', 'asc')->limit(5)->get();
        $renungans = Renungan::orderBy('id', 'asc')->limit(5)->get();
        $mimbars = Mimbar::orderBy('id', 'asc')->limit(5)->get();

        return view('welcome', [
            'beritas' => $beritas,
            'renungans' => $renungans,
            'mimbars' => $mimbars
        ]);
    }
}
