<?php

namespace App\Http\Controllers;

use App\Models\Reformasi;
use App\Models\Informasi;
use App\Models\Bantuan;
use App\Models\BantuanInformasi;
use App\Models\Mimbar;
use App\Models\Renungan;
use App\Models\Regulasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'search' => 'required|string',
        ]);

        $searchQuery = $request->search;

        // Search in multiple tables using LIKE
        $resultsTable1 = Reformasi::where('name', 'LIKE', "%{$searchQuery}%")->get()->map(function ($item) {
            $item->source = 'Reformasi Birokrasi'; // Add the source
            return $item;
        });
        $resultsTable2 = Informasi::where('judul', 'LIKE', "%{$searchQuery}%")->get()->map(function ($item) {
            $item->source = 'Berita'; // Add the source
            return $item;
        });
        $resultsTable3 = Bantuan::where('nama', 'LIKE', "%{$searchQuery}%")->get()->map(function ($item) {
            $item->source = 'Bantuan Tersalurkan'; // Add the source
            return $item;
        });
        $resultsTable4 = BantuanInformasi::where('nama', 'LIKE', "%{$searchQuery}%")->get()->map(function ($item) {
            $item->source = 'Informasi Bantuan'; // Add the source
            return $item;
        });
        $resultsTable5 = Mimbar::where('judul', 'LIKE', "%{$searchQuery}%")->get()->map(function ($item) {
            $item->source = 'Mimbar'; // Add the source
            return $item;
        });
        $resultsTable6 = Renungan::where('judul', 'LIKE', "%{$searchQuery}%")->get()->map(function ($item) {
            $item->source = 'Renungan'; // Add the source
            return $item;
        });
        $resultsTable7 = Regulasi::where('name', 'LIKE', "%{$searchQuery}%")->get()->map(function ($item) {
            if($item->kategori == 1){
                $item->source = 'Informasi Penting'; // Add the source
                return $item;
            } else{
                $item->source = 'Regulasi Penting'; // Add the source
                return $item;
            }
        });

        // Combine all results into one array
        $combinedResults = $resultsTable1->merge($resultsTable2)
                                         ->merge($resultsTable3)
                                         ->merge($resultsTable4)
                                         ->merge($resultsTable5)
                                         ->merge($resultsTable6)
                                         ->merge($resultsTable7);

        // Shuffle the combined results
        $combinedResults = $combinedResults->shuffle();

        return view('search-page', [
            'query' => $searchQuery,
            'responses' => $combinedResults
        ]);
    }
}
