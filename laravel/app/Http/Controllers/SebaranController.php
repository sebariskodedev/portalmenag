<?php

namespace App\Http\Controllers;

use App\Models\Sebaran;
use App\Models\Province;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SebaranController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sebarans = Sebaran::orderBy('id', 'asc')->get();

        return view('dashboard.data.sebaran.data.index', [
            'sebarans' => $sebarans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.data.sebaran.data.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'provinsi' => 'required|not_in:0',
            'umat' => 'required',
            'rumah_ibadah' => 'required',
            'lembaga' => 'required',
            'tokoh' => 'required',
            'penyuluh' => 'required',
            'pasraman' => 'required',
            'siswa' => 'required',
            'guru' => 'required',
            'perguruan_tinggi' => 'required',
            'dosen' => 'required',
            'mahasiswa' => 'required',
            'tenaga_administrasi' => 'required'
        ]);

        $sebaran = Sebaran::create($validated);
    
        // Add success alert and redirect
        Alert::success('Success', 'Sebaran Data has been saved!');
        return redirect('/admin/data-sebaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriDumas $kategoridumas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sebaran = Sebaran::findOrFail($id);

        return view('dashboard.data.sebaran.data.edit', [
            'sebaran' => $sebaran,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'provinsi' => 'required|not_in:0',
            'umat' => 'required',
            'rumah_ibadah' => 'required',
            'lembaga' => 'required',
            'tokoh' => 'required',
            'penyuluh' => 'required',
            'pasraman' => 'required',
            'siswa' => 'required',
            'guru' => 'required',
            'perguruan_tinggi' => 'required',
            'dosen' => 'required',
            'mahasiswa' => 'required',
            'tenaga_administrasi' => 'required'
        ]);

        // Find the record in the database
        $sebaran = Sebaran::findOrFail($id);

        // Update fields
        $sebaran->provinsi = $request->provinsi;
        $sebaran->umat = $request->umat;
        $sebaran->rumah_ibadah = $request->rumah_ibadah;
        $sebaran->lembaga = $request->lembaga;
        $sebaran->tokoh = $request->tokoh;
        $sebaran->penyuluh = $request->penyuluh;
        $sebaran->pasraman = $request->pasraman;
        $sebaran->siswa = $request->siswa;
        $sebaran->guru = $request->guru;
        $sebaran->perguruan_tinggi = $request->perguruan_tinggi;
        $sebaran->dosen = $request->dosen;
        $sebaran->mahasiswa = $request->mahasiswa;
        $sebaran->tenaga_administrasi = $request->tenaga_administrasi;
        // Save the updated record
        $sebaran->save();

        // Show success message and redirect
        Alert::info('Success', 'Sebaran Data has been updated!');
        return redirect('/admin/data-sebaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedkategoridumas = Sebaran::findOrFail($id);

            $deletedkategoridumas->delete();

            Alert::error('Success', 'Sebaran Data has been deleted !');
            return redirect('/admin/data-sebaran');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Sebaran Data already used !');
            return redirect('/admin/data-sebaran');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function getData()
    {
        $sebarans = Sebaran::orderBy('id', 'asc')->get();

        return view('sebaran', [
            'sebarans' => $sebarans
        ]);
    }
}
