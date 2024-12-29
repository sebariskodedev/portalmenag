<?php

namespace App\Http\Controllers;

use App\Models\Infografis;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class InfografisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infografiss = Infografis::orderBy('id', 'asc')->get();

        return view('dashboard.infografis.index', [
            'infografiss' => $infografiss
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.infografis.add');
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
        $uploadPath = 'infografis';
    
        // Move the file to the specified directory
        $file->move(public_path($uploadPath), $fileName);
    
        // Save the file's name to the database along with other fields
        $infografis = new Infografis();
        $infografis->judul = $request->judul;
        $infografis->deskripsi = $request->deskripsi;
        $infografis->gambar = $fileName; // Save only the file name to the database
        $infografis->save();
    
        // Optionally, you can generate a public URL for the uploaded file
        $fileUrl = asset($uploadPath . '/' . $fileName);
    
        // Add success alert and redirect
        Alert::success('Success', 'Infografis has been saved!');
        return redirect('/admin/infografis');
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
        $infografis = Infografis::findOrFail($id);

        return view('dashboard.infografis.edit', [
            'infografis' => $infografis,
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
        $infografis = Infografis::findOrFail($id);

        // Update fields
        $infografis->judul = $request->judul;
        $infografis->deskripsi = $request->deskripsi;

        // Check if a new file is uploaded
        if ($request->hasFile('gambar')) {
            // Get the uploaded file
            $file = $request->file('gambar');

            // Generate a unique filename with timestamp
            $timestamp = now()->format('YmdHis');
            $fileName = $timestamp . '.' . $file->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'infografis';

            // Move the file to the specified directory
            $file->move(public_path($uploadPath), $fileName);

            // Delete the old file if it exists
            if ($infografis->gambar && file_exists(public_path($uploadPath . '/' . $infografis->gambar))) {
                unlink(public_path($uploadPath . '/' . $infografis->gambar));
            }

            // Update the file name in the database
            $infografis->gambar = $fileName;
        }

        // Save the updated record
        $infografis->save();

        // Show success message and redirect
        Alert::info('Success', 'Infografis has been updated!');
        return redirect('/admin/infografis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedinfografis = Infografis::findOrFail($id);

            $deletedinfografis->delete();

            Alert::error('Success', 'Maklumat Infografis has been deleted !');
            return redirect('/admin/infografis');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Infografis already used !');
            return redirect('/admin/infografis');
        }
    }
    
    /**
     * Display a listing of the resource.
     */
    public function getInfografis()
    {
        $infografiss = Infografis::orderBy('id', 'asc')->get();

        return view('infografis', [
            'infografiss' => $infografiss
        ]);
    }
}
