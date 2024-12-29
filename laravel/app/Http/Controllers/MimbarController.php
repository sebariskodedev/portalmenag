<?php

namespace App\Http\Controllers;

use App\Models\Mimbar;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MimbarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mimbars = Mimbar::orderBy('id', 'asc')->get();

        return view('dashboard.mimbar.index', [
            'mimbars' => $mimbars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.mimbar.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'tipe' => 'required',
            'judul' => 'required',
            'gambar1' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Only images up to 2MB
            'keterangan1' => 'required',
            'deskripsi' => 'required',
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);
    
        // Get the uploaded file
        $file1 = $request->file('gambar1'); // Ensure this matches the form input name
    
        // Generate a unique filename with timestamp
        $timestamp1 = now()->format('YmdHis'); // e.g., 20241130123045
        $fileName1 = $timestamp1 . '.' . $file1->getClientOriginalExtension();
    
        // Define the upload path in the public directory
        $uploadPath = 'mimbar';
    
        // Move the file to the specified directory
        $file1->move(public_path($uploadPath), $fileName1);

        if($request->tipe == "2"){
            // Get the uploaded file
            $file2 = $request->file('gambar2'); // Ensure this matches the form input name
            // Generate a unique filename with timestamp
            $timestamp2 = now()->format('YmdHis'); // e.g., 20241130123045
            $fileName2 = $timestamp2 . '.' . $file2->getClientOriginalExtension();
            // Move the file to the specified directory
            $file2->move(public_path($uploadPath), $fileName2);

            // Save the file's name to the database along with other fields
            $berita = new Mimbar();
            $berita->type = 2;
            $berita->judul = $request->judul;
            $berita->author = Auth::id();
            $berita->deskripsi = $request->deskripsi;
            $berita->keterangan1 = $request->keterangan1;
            $berita->gambar1 = $fileName1; // Save only the file name to the database
            $berita->keterangan2 = $request->keterangan2;
            $berita->gambar2 = $fileName2; // Save only the file name to the database
            $berita->save();
        } else {
            // Save the file's name to the database along with other fields
            $berita = new Mimbar();
            $berita->type = 1;
            $berita->judul = $request->judul;
            $berita->author = Auth::id();
            $berita->deskripsi = $request->deskripsi;
            $berita->keterangan1 = $request->keterangan1;
            $berita->gambar1 = $fileName1; // Save only the file name to the database
            $berita->save();
        }
    
        // Add success alert and redirect
        Alert::success('Success', 'Mimbar has been saved!');
        return redirect('/informasi/mimbar');
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
        $mimbar = Mimbar::findOrFail($id);

        return view('dashboard.mimbar.edit', [
            'mimbar' => $mimbar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'tipe' => 'required',
            'judul' => 'required',
            'gambar1' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Only images up to 2MB
            'keterangan1' => 'required',
            'deskripsi' => 'required',
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        // Find the record in the database
        $berita = Mimbar::findOrFail($id);

        // Update fields
        $berita->type = $request->tipe;
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->keterangan1 = $request->keterangan1;

        $berita->keterangan2 = $request->keterangan2;

        // Check if a new file is uploaded
        if ($request->hasFile('gambar1')) {
            // Get the uploaded file
            $file1 = $request->file('gambar1');

            // Generate a unique filename with timestamp
            $timestamp1 = now()->format('YmdHis');
            $fileName1 = $timestamp1 . '.' . $file1->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'mimbar';

            // Move the file to the specified directory
            $file1->move(public_path($uploadPath), $fileName1);

            // Delete the old file if it exists
            if ($berita->gambar1 && file_exists(public_path($uploadPath . '/' . $berita->gambar1))) {
                unlink(public_path($uploadPath . '/' . $berita->gambar1));
            }

            // Update the file name in the database
            $berita->gambar1 = $fileName1;
        }

        // Check if a new file is uploaded
        if ($request->hasFile('gambar2')) {
            // Get the uploaded file
            $file2 = $request->file('gambar2');

            // Generate a unique filename with timestamp
            $timestamp2 = now()->format('YmdHis');
            $fileName2 = $timestamp2 . '.' . $file2->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'mimbar';

            // Move the file to the specified directory
            $file2->move(public_path($uploadPath), $fileName2);

            // Delete the old file if it exists
            if ($berita->gambar2 && file_exists(public_path($uploadPath . '/' . $berita->gambar2))) {
                unlink(public_path($uploadPath . '/' . $berita->gambar2));
            }

            // Update the file name in the database
            $berita->gambar2 = $fileName2;
        }

        // Save the updated record
        $berita->save();

        // Show success message and redirect
        Alert::info('Success', 'Mimbar has been updated!');
        return redirect('/informasi/mimbar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedberita = Mimbar::findOrFail($id);

            $deletedberita->delete();

            Alert::error('Success', 'Mimbar has been deleted !');
            return redirect('/informasi/mimbar');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Mimbar already used !');
            return redirect('/informasi/mimbar');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function getMimbarTerbaru()
    {
        $mimbars = Mimbar::orderBy('id', 'asc')->limit(5)->get();

        return view('mimbar-terbaru', [
            'mimbars' => $mimbars
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function getMimbar()
    {

        return view('article-page');
    }
}
