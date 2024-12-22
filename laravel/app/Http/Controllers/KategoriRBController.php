<?php

namespace App\Http\Controllers;

use App\Models\KategoriRB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;

class KategoriRBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategorirbs = KategoriRB::orderBy('id', 'asc')->get();

        return view('dashboard.rb.kategori.index', [
            'kategorirbs' => $kategorirbs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rb.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Only images up to 2MB
        ]);
    
        // Get the uploaded file
        $file = $request->file('gambar'); // Ensure this matches the form input name
    
        // Generate a unique filename with timestamp
        $timestamp = now()->format('YmdHis'); // e.g., 20241130123045
        $fileName = $timestamp . '.' . $file->getClientOriginalExtension();
    
        // Define the upload path in the public directory
        $uploadPath = 'kategoriRB';
    
        // Move the file to the specified directory
        $file->move(public_path($uploadPath), $fileName);
    
        // Save the file's name to the database along with other fields
        $kategorirb = new KategoriRB();
        $kategorirb->name = $request->name;
        $kategorirb->deskripsi = $request->deskripsi;
        $kategorirb->gambar = $fileName; // Save only the file name to the database
        $kategorirb->save();
    
        // Optionally, you can generate a public URL for the uploaded file
        $fileUrl = asset($uploadPath . '/' . $fileName);
    
        // Add success alert and redirect
        Alert::success('Success', 'Sub RB has been saved!');
        return redirect('/rb/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriRBs $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategorirb = KategoriRB::findOrFail($id);

        return view('dashboard.rb.kategori.edit', [
            'kategorirb' => $kategorirb,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Image is optional
        ]);

        // Find the record in the database
        $kategorirb = KategoriRB::findOrFail($id);

        // Update fields
        $kategorirb->name = $request->name;
        $kategorirb->deskripsi = $request->deskripsi;
        // Save the updated record

        // Check if a new file is uploaded
        if ($request->hasFile('gambar')) {
            // Get the uploaded file
            $file = $request->file('gambar');

            // Generate a unique filename with timestamp
            $timestamp = now()->format('YmdHis');
            $fileName = $timestamp . '.' . $file->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'kategoriRB';

            // Move the file to the specified directory
            $file->move(public_path($uploadPath), $fileName);

            // Delete the old file if it exists
            if ($kategorirb->gambar && file_exists(public_path($uploadPath . '/' . $kategorirb->gambar))) {
                unlink(public_path($uploadPath . '/' . $kategorirb->gambar));
            }

            // Update the file name in the database
            $kategorirb->gambar = $fileName;
        }
        $kategorirb->save();

        // Show success message and redirect
        Alert::info('Success', 'Sub RB has been updated!');
        return redirect('/rb/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deleteduser = KategoriRB::findOrFail($id);

            $deleteduser->delete();

            Alert::error('Success', 'Sub RB has been deleted !');
            return redirect('/rb/kategori');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Sub RB already used !');
            return redirect('/rb/kategori');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function getKategori()
    {
        $kategorirbs = KategoriRB::orderBy('id', 'asc')->get();

        return view('reformasi-birokrasi', [
            'kategorirbs' => $kategorirbs
        ]);
    }
}
