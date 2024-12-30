<?php

namespace App\Http\Controllers;

use App\Models\BantuanInformasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BantuanInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bantuans = BantuanInformasi::orderBy('id', 'asc')->get();

        return view('dashboard.bantuan.informasi.index', [
            'bantuans' => $bantuans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.bantuan.informasi.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'nama' => 'required',
            'tipe' => 'required',
            'jumlah_kuota' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'tanggal_pembukaan' => 'required',
            'tanggal_penutupan' => 'required',
            'pic' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Only images up to 2MB
        ]);
    
        // Get the uploaded file
        $file = $request->file('gambar'); // Ensure this matches the form input name
    
        // Generate a unique filename with timestamp
        $timestamp = now()->format('YmdHis'); // e.g., 20241130123045
        $fileName = $timestamp . '.' . $file->getClientOriginalExtension();
    
        // Define the upload path in the public directory
        $uploadPath = 'bantuan-informasi';
    
        // Move the file to the specified directory
        $file->move(public_path($uploadPath), $fileName);
    
        // Save the file's name to the database along with other fields
        $bantuan = new BantuanInformasi();
        $bantuan->nama = $request->nama;
        $bantuan->tipe = $request->tipe;
        $bantuan->jumlah_kuota = $request->jumlah_kuota;
        $bantuan->jenis = $request->jenis;
        $bantuan->kategori = $request->kategori;
        $bantuan->tanggal_pembukaan = $request->tanggal_pembukaan;
        $bantuan->tanggal_penutupan = $request->tanggal_penutupan;
        $bantuan->pic = $request->pic;
        $bantuan->status = $request->status;
        $bantuan->deskripsi = $request->deskripsi;
        $bantuan->gambar = $fileName; // Save only the file name to the database

        // Check if a new file is uploaded
        if ($request->hasFile('juknis')) {

            // Get the uploaded file
            $file = $request->file('juknis'); // Ensure this matches the form input name
    
            // Generate a unique filename with timestamp
            $timestamp = now()->format('YmdHis'); // e.g., 20241130123045
            $fileNameLampiran = $timestamp . '.' . $file->getClientOriginalExtension();
    
            // Define the upload path in the public directory
            $uploadPath = 'juknis-bantuan-informasi';
    
            // Move the file to the specified directory
            $file->move(public_path($uploadPath), $fileNameLampiran);
            $bantuan->juknis = $fileNameLampiran;
        }

        $bantuan->save();
    
    
        // Add success alert and redirect
        Alert::success('Success', 'Bantuan has been saved!');
        return redirect('/admin/bantuan-informasi');
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
        $bantuan = BantuanInformasi::findOrFail($id);

        return view('dashboard.bantuan.informasi.edit', [
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
            'nama' => 'required',
            'tipe' => 'required',
            'jumlah_kuota' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'tanggal_pembukaan' => 'required',
            'tanggal_penutupan' => 'required',
            'pic' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Only images up to 2MB
        ]);

        // Find the record in the database
        $bantuan = BantuanInformasi::findOrFail($id);

        // Update fields
        $bantuan->nama = $request->nama;
        $bantuan->tipe = $request->tipe;
        $bantuan->jumlah_kuota = $request->jumlah_kuota;
        $bantuan->jenis = $request->jenis;
        $bantuan->kategori = $request->kategori;
        $bantuan->tanggal_pembukaan = $request->tanggal_pembukaan;
        $bantuan->tanggal_penutupan = $request->tanggal_penutupan;
        $bantuan->pic = $request->pic;
        $bantuan->status = $request->status;
        $bantuan->deskripsi = $request->deskripsi;

        // Check if a new file is uploaded
        if ($request->hasFile('gambar')) {
            // Get the uploaded file
            $file = $request->file('gambar');

            // Generate a unique filename with timestamp
            $timestamp = now()->format('YmdHis');
            $fileName = $timestamp . '.' . $file->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'bantuan-informasi';

            // Move the file to the specified directory
            $file->move(public_path($uploadPath), $fileName);

            // Delete the old file if it exists
            if ($bantuan->gambar && file_exists(public_path($uploadPath . '/' . $bantuan->gambar))) {
                unlink(public_path($uploadPath . '/' . $bantuan->gambar));
            }

            // Update the file name in the database
            $bantuan->gambar = $fileName;
        }

        // Check if a new file is uploaded
        if ($request->hasFile('juknis')) {

            // Get the uploaded file
            $file2 = $request->file('juknis'); // Ensure this matches the form input name
    
            // Generate a unique filename with timestamp
            $timestamp = now()->format('YmdHis'); // e.g., 20241130123045
            $fileNameLampiran = $timestamp . '.' . $file2->getClientOriginalExtension();
    
            // Define the upload path in the public directory
            $uploadPath = 'juknis-bantuan-informasi';
    
            // Move the file to the specified directory
            $file2->move(public_path($uploadPath), $fileNameLampiran);
            $bantuan->juknis = $fileNameLampiran;
        }

        // Save the updated record
        $bantuan->save();

        // Show success message and redirect
        Alert::info('Success', 'Bantuan has been updated!');
        return redirect('/admin/bantuan-informasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedbantuan = BantuanInformasi::findOrFail($id);

            $deletedbantuan->delete();

            Alert::error('Success', 'Bantuan Tersalurkan has been deleted !');
            return redirect('/admin/bantuan-informasi');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Bantuan Tersalurkan already used !');
            return redirect('/admin/bantuan-informasi');
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
        $bantuans = BantuanInformasi::orderBy('id', 'asc')->get();

        return view('bantuan-informasi', [
            'bantuans' => $bantuans
        ]);
    }
}
