<?php

namespace App\Http\Controllers;

use App\Models\Uker;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ukers = Uker::orderBy('id', 'asc')->get();

        return view('dashboard.uker.index', [
            'ukers' => $ukers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.uker.add');
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

        $uker = Uker::create($validated);
    
        // Add success alert and redirect
        Alert::success('Success', 'Unit Kerja has been saved!');
        return redirect('/pelayanan/uker');
    }

    /**
     * Display the specified resource.
     */
    public function show(Uker $uker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $uker = Uker::findOrFail($id);

        return view('dashboard.uker.edit', [
            'uker' => $uker,
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
        $uker = Uker::findOrFail($id);

        // Update fields
        $uker->name = $request->name;
        $uker->deskripsi = $request->deskripsi;
        // Save the updated record
        $uker->save();

        // Show success message and redirect
        Alert::info('Success', 'Unit Kerja has been updated!');
        return redirect('/pelayanan/uker');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deleteduker = Uker::findOrFail($id);

            $deleteduker->delete();

            Alert::error('Success', 'Unit Kerja has been deleted !');
            return redirect('/pelayanan/uker');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Layanan already used !');
            return redirect('/pelayanan/uker');
        }
    }
}
