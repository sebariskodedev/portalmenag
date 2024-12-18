<?php

namespace App\Http\Controllers;

use App\Models\Infografis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $infografis = Infografis::count();

        return view('dashboard.dashboard', [
            'infografis' => $infografis,
        ]);
    }
}
