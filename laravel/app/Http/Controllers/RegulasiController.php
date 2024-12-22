<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;

class RegulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regulasis = Regulasi::orderBy('id', 'asc')->get();

        return view('dashboard.informasi-regulasi.index', [
            'regulasis' => $regulasis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.informasi-regulasi.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'kategori' => 'required|not_in:0',
            'name' => 'required',
            'deskripsi' => 'required',
            'dokumen' => 'required|mimes:pdf'
        ]);

        // Get the uploaded file
        $file = $request->file('dokumen'); // Ensure this matches the form input name

        // Generate a unique filename with timestamp
        $timestamp = now()->format('YmdHis'); // e.g., 20241130123045
        $fileName = $timestamp . '.' . $file->getClientOriginalExtension();

        // Define the upload path in the public directory
        $uploadPath = 'dokumenRegulasi';

        // Move the file to the specified directory
        $file->move(public_path($uploadPath), $fileName);

        // Save the file's name to the database along with other fields
        $rb = new Regulasi();
        $rb->kategori = $request->kategori;
        $rb->name = $request->name;
        $rb->deskripsi = $request->deskripsi;
        $rb->dokumen = $fileName; // Save only the file name to the database
        $rb->save();

        // Optionally, you can generate a public URL for the uploaded file
        $fileUrl = asset($uploadPath . '/' . $fileName);

        // Add success alert and redirect
        Alert::success('Success', 'Informasi/Regulasi Penting has been saved!');
        return redirect('/admin/informasi-regulasi');
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
        $regulasi = Regulasi::findOrFail($id);

        return view('dashboard.informasi-regulasi.edit', [
            'regulasi' => $regulasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'kategori' => 'required|not_in:0',
            'name' => 'required',
            'deskripsi' => 'required',
            'dokumen' => 'nullable|mimes:pdf', // Image is optional
        ]);

        // Find the record in the database
        $regulasi = Regulasi::findOrFail($id);

        // Update fields
        $regulasi->kategori = $request->kategori;
        $regulasi->name = $request->name;
        $regulasi->deskripsi = $request->deskripsi;
        // Save the updated record

        // Check if a new file is uploaded
        if ($request->hasFile('dokumen')) {
            // Get the uploaded file
            $file = $request->file('dokumen');

            // Generate a unique filename with timestamp
            $timestamp = now()->format('YmdHis');
            $fileName = $timestamp . '.' . $file->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'dokumenRegulasi';

            // Move the file to the specified directory
            $file->move(public_path($uploadPath), $fileName);

            // Delete the old file if it exists
            if ($regulasi->dokumen && file_exists(public_path($uploadPath . '/' . $regulasi->dokumen))) {
                unlink(public_path($uploadPath . '/' . $regulasi->dokumen));
            }

            // Update the file name in the database
            $regulasi->dokumen = $fileName;
        }
        $regulasi->save();

        // Show success message and redirect
        Alert::info('Success', 'Informasi/Regulasi Penting has been updated!');
        return redirect('/admin/informasi-regulasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deleteduser = Regulasi::findOrFail($id);

            $deleteduser->delete();

            Alert::error('Success', 'Informasi/Regulasi Penting has been deleted !');
            return redirect('/admin/informasi-regulasi');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Informasi/Regulasi Penting already used !');
            return redirect('/admin/informasi-regulasi');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function showInformasiRegulasi()
    {
        $regulasis = Regulasi::orderBy('id', 'asc')->get();

        return view('informasi-regulasi', [
            'regulasis' => $regulasis
        ]);
    }

    public function getJsonRegulasi()
    {
        // Generate dummy data
        $data = [
            [
                'title' => 'Standard Pelayanan Direktorat Urusan Katolik',
                'time' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Standard Pelayanan Subdirektorat Pendidikan Tinggi Katolik',
                'time' => now()->addHour()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Standard Pelayanan Subdirektorat Pendidikan Menengah Katolik',
                'time' => now()->addHours(2)->format('Y-m-d H:i:s'),
            ],
        ];

        // Return JSON response
        return response()->json(['results' => $data]);
    }

    public function getJsonInformasi()
    {
        // Generate dummy data
        $data = [
            [
                'title' => 'Standard Pelayanan Direktorat Urusan Katolik',
                'time' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Standard Pelayanan Subdirektorat Pendidikan Tinggi Katolik',
                'time' => now()->addHour()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Standard Pelayanan Subdirektorat Pendidikan Menengah Katolik',
                'time' => now()->addHours(2)->format('Y-m-d H:i:s'),
            ],
        ];

        // Return JSON response
        return response()->json(['results' => $data]);
    }

    public function getInfoRegulasi($kategori, $id)
    {

        // Find the record in the database
        $regulasi = Regulasi::findOrFail($id);

        return view('informasi-regulasi-action', [
            'regulasi' => $regulasi
        ]);
    }
}
