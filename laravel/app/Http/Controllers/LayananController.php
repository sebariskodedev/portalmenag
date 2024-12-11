<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanans = Layanan::orderBy('id', 'asc')->get();

        return view('dashboard.maklumat-pelayanan.index', [
            'layanans' => $layanans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.maklumat-pelayanan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
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
        $uploadPath = 'maklumat-pelayanan';
    
        // Move the file to the specified directory
        $file->move(public_path($uploadPath), $fileName);
    
        // Save the file's name to the database along with other fields
        $layanan = new Layanan();
        $layanan->judul = $request->judul;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->gambar = $fileName; // Save only the file name to the database
        $layanan->save();
    
        // Optionally, you can generate a public URL for the uploaded file
        $fileUrl = asset($uploadPath . '/' . $fileName);
    
        // Add success alert and redirect
        Alert::success('Success', 'Layanan has been saved!');
        return redirect('/pelayanan/maklumat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);

        return view('dashboard.maklumat-pelayanan.edit', [
            'layanan' => $layanan,
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
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Image is optional
        ]);

        // Find the record in the database
        $layanan = Layanan::findOrFail($id);

        // Update fields
        $layanan->judul = $request->judul;
        $layanan->deskripsi = $request->deskripsi;

        // Check if a new file is uploaded
        if ($request->hasFile('gambar')) {
            // Get the uploaded file
            $file = $request->file('gambar');

            // Generate a unique filename with timestamp
            $timestamp = now()->format('YmdHis');
            $fileName = $timestamp . '.' . $file->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'maklumat-pelayanan';

            // Move the file to the specified directory
            $file->move(public_path($uploadPath), $fileName);

            // Delete the old file if it exists
            if ($layanan->gambar && file_exists(public_path($uploadPath . '/' . $layanan->gambar))) {
                unlink(public_path($uploadPath . '/' . $layanan->gambar));
            }

            // Update the file name in the database
            $layanan->gambar = $fileName;
        }

        // Save the updated record
        $layanan->save();

        // Show success message and redirect
        Alert::info('Success', 'Maklumat Pelayanan has been updated!');
        return redirect('/pelayanan/maklumat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedlayanan = Layanan::findOrFail($id);

            $deletedlayanan->delete();

            Alert::error('Success', 'Maklumat Layanan has been deleted !');
            return redirect('/pelayanan/maklumat');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Layanan already used !');
            return redirect('/pelayanan/maklumat');
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function getMaklumatPelayanan()
    {

        return view('maklumat-pelayanan');
    }
    /**
     * Display a listing of the resource.
     */
    public function getStandardPelayanan()
    {

        return view('standard-pelayanan');
    }
}
