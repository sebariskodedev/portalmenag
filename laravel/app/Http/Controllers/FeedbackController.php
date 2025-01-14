<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Exports\FeedbackExport;
use Maatwebsite\Excel\Facades\Excel;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function feedback()
    {
        $feedbacks = Feedback::orderBy('id', 'asc')->get();

        return view('dashboard.feedback.index', [
            'feedbacks' => $feedbacks
        ]);
    }

    public function exportCsv()
    {
        return Excel::download(new FeedbackExport, 'feedback_export.csv');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request)
    {
        
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'gender' => 'required',
            'umur' => 'required',
            'pekerjaan' => 'required',
            'pendapat' => 'required',
            'rekomendasi' => 'required',
            'favorite_menu' => 'required'
        ]);
    
        $feedbacks = Feedback::create([
            'gender' => $request->gender,
            'umur' => $request->umur,
            'pekerjaan' => $request->pekerjaan,
            'pendapat' => $request->pendapat,
            'rekomendasi' => $request->rekomendasi,
            'favorite_menu' => $request->favorite_menu,
            'saran' => $request->saran,
        ]);
    
        return response()->json([
            'feedbacks' => $feedbacks
        ]);
    }
}
