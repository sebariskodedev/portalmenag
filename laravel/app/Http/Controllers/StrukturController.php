<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strukturs = Struktur::orderBy('id', 'asc')->get();

        return view('dashboard.struktur.index', [
            'strukturs' => $strukturs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $struktur = Struktur::findOrFail($id);

        return view('dashboard.struktur.edit', [
            'struktur' => $struktur,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Image is optional
        ]);

        // Find the record in the database
        $struktur = Struktur::findOrFail($id);

        // Update fields
        $struktur->judul = $request->judul;

        // Check if a new file is uploaded
        if ($request->hasFile('gambar')) {
            // Get the uploaded file
            $file = $request->file('gambar');

            // Generate a unique filename with timestamp
            $timestamp = now()->format('YmdHis');
            $fileName = $timestamp . '.' . $file->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'struktur';

            // Move the file to the specified directory
            $file->move(public_path($uploadPath), $fileName);

            // Delete the old file if it exists
            if ($struktur->gambar && file_exists(public_path($uploadPath . '/' . $struktur->gambar))) {
                unlink(public_path($uploadPath . '/' . $struktur->gambar));
            }

            // Update the file name in the database
            $struktur->gambar = $fileName;
        }

        // Save the updated record
        $struktur->save();

        // Show success message and redirect
        Alert::info('Success', 'Struktur Organisasi has been updated!');
        return redirect('/admin/struktur');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getStruktur($id)
    {
        $struktur = Struktur::findOrFail($id);
        // $strukturs = Struktur::orderBy('id', 'asc')->get();

        return view('struktur-organisasi', [
            'struktur' => $struktur
        ]);
    }
}
