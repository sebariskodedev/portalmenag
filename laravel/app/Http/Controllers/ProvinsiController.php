<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProvinsiController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinsis = Provinsi::orderBy('id', 'asc')->get();

        return view('dashboard.data.sebaran.provinsi.index', [
            'provinsis' => $provinsis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.data.sebaran.provinsi.add');
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
        ]);

        $provinsi = Provinsi::create($validated);
    
        // Add success alert and redirect
        Alert::success('Success', 'Provinsi has been saved!');
        return redirect('/admin/data-provinsi');
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
        $provinsi = Provinsi::findOrFail($id);

        return view('dashboard.data.sebaran.provinsi.edit', [
            'provinsi' => $provinsi,
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
        ]);

        // Find the record in the database
        $provinsi = Provinsi::findOrFail($id);

        // Update fields
        $provinsi->name = $request->name;
        $provinsi->deskripsi = $request->deskripsi;
        // Save the updated record
        $provinsi->save();

        // Show success message and redirect
        Alert::info('Success', 'Provinsi has been updated!');
        return redirect('/admin/data-provinsi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedkategoridumas = Provinsi::findOrFail($id);

            $deletedkategoridumas->delete();

            Alert::error('Success', 'Provinsi has been deleted !');
            return redirect('/admin/data-provinsi');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Provinsi already used !');
            return redirect('/admin/data-provinsi');
        }
    }
}
