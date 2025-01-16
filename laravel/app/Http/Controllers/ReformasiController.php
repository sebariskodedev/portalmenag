<?php

namespace App\Http\Controllers;

use App\Models\KategoriRB;
use App\Models\Reformasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;

class ReformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reformasis = Reformasi::orderBy('id', 'asc')->get();

        return view('dashboard.rb.data.index', [
            'reformasis' => $reformasis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategorirb = KategoriRB::orderBy('id', 'asc')->get();
        return view('dashboard.rb.data.add', [
            'kategorirb' => $kategorirb
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'sub_rb' => 'required|not_in:0',
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
        $uploadPath = 'dokumenRB';

        // Move the file to the specified directory
        $file->move(public_path($uploadPath), $fileName);

        // Save the file's name to the database along with other fields
        $rb = new Reformasi();
        $rb->sub_rb = $request->sub_rb;
        $rb->name = $request->name;
        $rb->deskripsi = $request->deskripsi;
        $rb->dokumen = $fileName; // Save only the file name to the database
        $rb->save();

        // Optionally, you can generate a public URL for the uploaded file
        $fileUrl = asset($uploadPath . '/' . $fileName);

        // Add success alert and redirect
        Alert::success('Success', 'Data RB has been saved!');
        return redirect('/rb/data');
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
        $kategorirb = KategoriRB::orderBy('id', 'asc')->get();
        $reformasi = Reformasi::findOrFail($id);

        return view('dashboard.rb.data.edit', [
            'reformasi' => $reformasi,
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
            'sub_rb' => 'required|not_in:0',
            'name' => 'required',
            'deskripsi' => 'required',
            'dokumen' => 'nullable|mimes:pdf', // Image is optional
        ]);

        // Find the record in the database
        $reformasi = Reformasi::findOrFail($id);

        // Update fields
        $reformasi->sub_rb = $request->sub_rb;
        $reformasi->name = $request->name;
        $reformasi->deskripsi = $request->deskripsi;
        // Save the updated record

        // Check if a new file is uploaded
        if ($request->hasFile('dokumen')) {
            // Get the uploaded file
            $file = $request->file('dokumen');

            // Generate a unique filename with timestamp
            $timestamp = now()->format('YmdHis');
            $fileName = $timestamp . '.' . $file->getClientOriginalExtension();

            // Define the upload path in the public directory
            $uploadPath = 'dokumenRB';

            // Move the file to the specified directory
            $file->move(public_path($uploadPath), $fileName);

            // Delete the old file if it exists
            if ($reformasi->dokumen && file_exists(public_path($uploadPath . '/' . $reformasi->dokumen))) {
                unlink(public_path($uploadPath . '/' . $reformasi->dokumen));
            }

            // Update the file name in the database
            $reformasi->dokumen = $fileName;
        }
        $reformasi->save();

        // Show success message and redirect
        Alert::info('Success', 'Data RB has been updated!');
        return redirect('/rb/data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deleteduser = Reformasi::findOrFail($id);

            $deleteduser->delete();

            Alert::error('Success', 'Data RB has been deleted !');
            return redirect('/rb/data');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Data RB already used !');
            return redirect('/rb/data');
        }
    }

    public function action($id)
    {
        $reformasis = Reformasi::where('sub_rb', $id)->orderBy('id', 'asc')->get();

        return view('reformasi-birokrasi-action', [
            'reformasis' => $reformasis
        ]);
    }

    public function getJsonRB()
    {
        // Generate dummy data
        $data = [
            [
                'title' => 'Laporan Capaian Kinerja Ditjen Bimas Katolik Triwulan III 2024',
                'time' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Laporan Capaian Kinerja Ditjen Bimas Katolik Triwulan II 2024',
                'time' => now()->addHour()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Laporan Capaian Kinerja Ditjen Bimas Katolik Triwulan I 2024',
                'time' => now()->addHour()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Laporan Kinerja Tahun 2023',
                'time' => now()->addHours(2)->format('Y-m-d H:i:s'),
            ],
        ];

        // Return JSON response
        return response()->json(['results' => $data]);
    }

    public function actionChild($id)
    {
        $reformasi = Reformasi::findOrFail($id);

        return view('reformasi-birokrasi-action-child', [
            'reformasi' => $reformasi
        ]);
    }
}
