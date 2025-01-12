<?php

namespace App\Http\Controllers;

use App\Models\Renungan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RenunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $renungans = Renungan::orderBy('id', 'asc')->get();

        return view('dashboard.renungan.index', [
            'renungans' => $renungans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.renungan.add');
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
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'sumber' => 'required',
            'metadata' => 'required',
            'metatag' => 'required',
            'metatitle' => 'required',
            'metadeskripsi' => 'required'
        ]);
    
        // Get the uploaded file
        $file1 = $request->file('gambar1'); // Ensure this matches the form input name
    
        // Generate a unique filename with timestamp
        $timestamp1 = now()->format('YmdHis'); // e.g., 20241130123045
        $fileName1 = $timestamp1 . '.' . $file1->getClientOriginalExtension();
    
        // Define the upload path in the public directory
        $uploadPath = 'renungan';
    
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
            $berita = new Renungan();
            $berita->type = 2;
            $berita->judul = $request->judul;
            $berita->author = Auth::id();
            $berita->editor = Auth::id();
            $berita->sumber = $request->sumber;
            $berita->metadata = $request->metadata;
            $berita->metatag = $request->metatag;
            $berita->metatitle = $request->metatitle;
            $berita->metadeskripsi = $request->metadeskripsi;
            $berita->deskripsi = $request->deskripsi;
            $berita->keterangan1 = $request->keterangan1;
            $berita->gambar1 = $fileName1; // Save only the file name to the database
            $berita->keterangan2 = $request->keterangan2;
            $berita->gambar2 = $fileName2; // Save only the file name to the database
            $berita->status = 'non-aktif'; // Save only the file name to the database
            $berita->save();
        } else {
            // Save the file's name to the database along with other fields
            $berita = new Renungan();
            $berita->type = 1;
            $berita->judul = $request->judul;
            $berita->author = Auth::id();
            $berita->editor = Auth::id();
            $berita->sumber = $request->sumber;
            $berita->metadata = $request->metadata;
            $berita->metatag = $request->metatag;
            $berita->metatitle = $request->metatitle;
            $berita->metadeskripsi = $request->metadeskripsi;
            $berita->deskripsi = $request->deskripsi;
            $berita->keterangan1 = $request->keterangan1;
            $berita->gambar1 = $fileName1; // Save only the file name to the database
            $berita->status = 'non-aktif'; // Save only the file name to the database
            $berita->save();
        }
    
        // Add success alert and redirect
        Alert::success('Success', 'Renungan has been saved!');
        return redirect('/informasi/renungan');
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
        $renungan = Renungan::findOrFail($id);

        return view('dashboard.renungan.edit', [
            'renungan' => $renungan,
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
            'gambar2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'sumber' => 'required',
            'metadata' => 'required',
            'metatag' => 'required',
            'metatitle' => 'required',
            'metadeskripsi' => 'required'
        ]);

        // Find the record in the database
        $berita = Renungan::findOrFail($id);

        // Update fields
        $berita->type = $request->tipe;
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->keterangan1 = $request->keterangan1;
        $berita->editor = Auth::id();
        $berita->sumber = $request->sumber;
        $berita->metadata = $request->metadata;
        $berita->metatag = $request->metatag;
        $berita->metatitle = $request->metatitle;
        $berita->metadeskripsi = $request->metadeskripsi;

        $berita->keterangan2 = $request->keterangan2;

        // Check if a new file is uploaded
        if ($request->hasFile('gambar1')) {
            // Get the uploaded file
            $file1 = $request->file('gambar1');

            // Generate a unique filename with timestamp
            $timestamp1 = now()->format('YmdHis');
            $fileName1 = $timestamp1 . '.' . $file1->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'renungan';

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
            $uploadPath = 'renungan';

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
        Alert::info('Success', 'Renungan has been updated!');
        return redirect('/informasi/renungan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedberita = Renungan::findOrFail($id);

            $deletedberita->delete();

            Alert::error('Success', 'Renungan has been deleted !');
            return redirect('/informasi/renungan');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Renungan already used !');
            return redirect('/informasi/renungan');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function getRenunganTerbaru(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'search' => 'string',
        ]);

        if($request->search){
            $searchQuery = $request->search;
            $renungans = Renungan::where('judul', 'LIKE', "%{$searchQuery}%")->limit(18)->get()->map(function ($item) {
                return $item;
            });
            return view('renungan-terbaru', [
                'renungans' => $renungans
            ]);
        } else{
            $renungans = Renungan::orderBy('id', 'asc')->limit(18)->get();
    
            return view('renungan-terbaru', [
                'renungans' => $renungans
            ]);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function getRenungan()
    {

        return view('article-page');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatusRenungan(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'status' => 'required'
        ]);

        // Find the record in the database
        $berita = Renungan::findOrFail($id);

        // Update fields
        $berita->status = $request->status;

        // Save the updated record
        $berita->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
    }
}
