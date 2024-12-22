<?php

namespace App\Http\Controllers;

use App\Models\StandardPelayanan;
use App\Models\Uker;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StandardPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standardpelayanans = StandardPelayanan::orderBy('id', 'asc')->get();

        return view('dashboard.standard-pelayanan.index', [
            'standardpelayanans' => $standardpelayanans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ukers = Uker::orderBy('id', 'asc')->get();
        
        return view('dashboard.standard-pelayanan.add', [
            'ukers' => $ukers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'uker' => 'required|not_in:0',
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Only images up to 2MB
        ]);
    
        // Get the uploaded file
        $file = $request->file('gambar'); // Ensure this matches the form input name
    
        // Generate a unique filename with timestamp
        $timestamp = now()->format('YmdHis'); // e.g., 20241130123045
        $fileName = $timestamp . '.' . $file->getClientOriginalExtension();
    
        // Define the upload path in the public directory
        $uploadPath = 'standards';
    
        // Move the file to the specified directory
        $file->move(public_path($uploadPath), $fileName);
    
        // Save the file's name to the database along with other fields
        $standard = new StandardPelayanan();
        $standard->uker = $request->uker;
        $standard->judul = $request->judul;
        $standard->deskripsi = $request->deskripsi;
        $standard->gambar = $fileName; // Save only the file name to the database
        $standard->save();
    
        // Optionally, you can generate a public URL for the uploaded file
        $fileUrl = asset($uploadPath . '/' . $fileName);
    
        // Add success alert and redirect
        Alert::success('Success', 'Standard pelayanan has been saved!');
        return redirect('/pelayanan/standard');
    }

    /**
     * Display the specified resource.
     */
    public function show(StandardPelayanan $standardpelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $standardpelayanan = StandardPelayanan::findOrFail($id);
        $ukers = Uker::orderBy('id', 'asc')->get();

        return view('dashboard.standard-pelayanan.edit', [
            'standardpelayanan' => $standardpelayanan,
            'ukers' => $ukers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'uker' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        // Find the record in the database
        $standardpelayanan = StandardPelayanan::findOrFail($id);

        // Update fields
        $standardpelayanan->uker = $request->uker;
        $standardpelayanan->judul = $request->judul;
        $standardpelayanan->deskripsi = $request->deskripsi;

        // Check if a new file is uploaded
        if ($request->hasFile('gambar')) {
            // Get the uploaded file
            $file = $request->file('standards');

            // Generate a unique filename with timestamp
            $timestamp = now()->format('YmdHis');
            $fileName = $timestamp . '.' . $file->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'infografis';

            // Move the file to the specified directory
            $file->move(public_path($uploadPath), $fileName);

            // Delete the old file if it exists
            if ($standardpelayanan->gambar && file_exists(public_path($uploadPath . '/' . $standardpelayanan->gambar))) {
                unlink(public_path($uploadPath . '/' . $standardpelayanan->gambar));
            }

            // Update the file name in the database
            $standardpelayanan->gambar = $fileName;
        }

        $standardpelayanan->save();

        // Show success message and redirect
        Alert::info('Success', 'Standard Pelayanan has been updated!');
        return redirect('/pelayanan/standard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedstandardpelayanan = StandardPelayanan::findOrFail($id);

            $deletedstandardpelayanan->delete();

            Alert::error('Success', 'Standard Pelayanan has been deleted !');
            return redirect('/pelayanan/standard');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Layanan already used !');
            return redirect('/pelayanan/standard');
        }
    }
}
