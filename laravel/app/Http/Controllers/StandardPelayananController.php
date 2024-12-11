<?php

namespace App\Http\Controllers;

use App\Models\StandardPelayanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StandardPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standardpelayanans = StandardPelayanan::orderBy('id', 'asc')->get();

        return view('dashboard.standard-pelayanan.index', [
            'standardpelayanans' => $standardpelayanans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.standard-pelayanan.add');
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

        $standardpelayanan = StandardPelayanan::create($validated);
    
        // Add success alert and redirect
        Alert::success('Success', 'Standard Pelayanan has been saved!');
        return redirect('/pelayanan/standard-pelayanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(StandardPelayanan $standardpelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $standardpelayanan = StandardPelayanan::findOrFail($id);

        return view('dashboard.standard-pelayanan.edit', [
            'standardpelayanan' => $standardpelayanan,
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
        $standardpelayanan = StandardPelayanan::findOrFail($id);

        // Update fields
        $standardpelayanan->name = $request->name;
        $standardpelayanan->deskripsi = $request->deskripsi;
        // Save the updated record
        $standardpelayanan->save();

        // Show success message and redirect
        Alert::info('Success', 'Standard Pelayanan has been updated!');
        return redirect('/pelayanan/standard-pelayanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedstandardpelayanan = StandardPelayanan::findOrFail($id);

            $deletedstandardpelayanan->delete();

            Alert::error('Success', 'Standard Pelayanan has been deleted !');
            return redirect('/pelayanan/standard-pelayanan');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Layanan already used !');
            return redirect('/pelayanan/standard-pelayanan');
        }
    }
}
