<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bantuans = Bantuan::orderBy('id', 'asc')->get();

        return view('dashboard.bantuan.tersalurkan.index', [
            'bantuans' => $bantuans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.bantuan.tersalurkan.add');
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
        $uploadPath = 'bantuan-tersalurkan';
    
        // Move the file to the specified directory
        $file->move(public_path($uploadPath), $fileName);
    
        // Save the file's name to the database along with other fields
        $bantuan = new Bantuan();
        $bantuan->judul = $request->judul;
        $bantuan->deskripsi = $request->deskripsi;
        $bantuan->gambar = $fileName; // Save only the file name to the database
        $bantuan->save();
    
        // Optionally, you can generate a public URL for the uploaded file
        $fileUrl = asset($uploadPath . '/' . $fileName);
    
        // Add success alert and redirect
        Alert::success('Success', 'Bantuan has been saved!');
        return redirect('/admin/bantuan-tersalurkan');
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
        $bantuan = Bantuan::findOrFail($id);

        return view('dashboard.bantuan.tersalurkan.edit', [
            'bantuan' => $bantuan,
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
        $bantuan = Bantuan::findOrFail($id);

        // Update fields
        $bantuan->judul = $request->judul;
        $bantuan->deskripsi = $request->deskripsi;

        // Check if a new file is uploaded
        if ($request->hasFile('gambar')) {
            // Get the uploaded file
            $file = $request->file('gambar');

            // Generate a unique filename with timestamp
            $timestamp = now()->format('YmdHis');
            $fileName = $timestamp . '.' . $file->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'bantuan-tersalurkan';

            // Move the file to the specified directory
            $file->move(public_path($uploadPath), $fileName);

            // Delete the old file if it exists
            if ($bantuan->gambar && file_exists(public_path($uploadPath . '/' . $bantuan->gambar))) {
                unlink(public_path($uploadPath . '/' . $bantuan->gambar));
            }

            // Update the file name in the database
            $bantuan->gambar = $fileName;
        }

        // Save the updated record
        $bantuan->save();

        // Show success message and redirect
        Alert::info('Success', 'Bantuan has been updated!');
        return redirect('/admin/bantuan-tersalurkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedbantuan = Bantuan::findOrFail($id);

            $deletedbantuan->delete();

            Alert::error('Success', 'Bantuan Tersalurkan has been deleted !');
            return redirect('/admin/bantuan-tersalurkan');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Bantuan Tersalurkan already used !');
            return redirect('/admin/bantuan-tersalurkan');
        }
    }

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
        $bantuans = Bantuan::orderBy('id', 'asc')->get();

        return view('bantuan-tersalurkan', [
            'bantuans' => $bantuans
        ]);
    }
}
