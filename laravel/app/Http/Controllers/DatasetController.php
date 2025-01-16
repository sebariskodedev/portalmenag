<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datasets = Dataset::orderBy('id', 'asc')->get();

        return view('dashboard.data.dataset.index', [
            'datasets' => $datasets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.data.dataset.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);
    
        // Save the file's name to the database along with other fields
        $kategorirb = new Dataset();
        $kategorirb->judul = $request->judul;
        $kategorirb->deskripsi = $request->deskripsi;
        $kategorirb->save();
    
        // Add success alert and redirect
        Alert::success('Success', 'Dataset has been saved!');
        return redirect('/admin/data-set');
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
        $dataset = Dataset::findOrFail($id);

        return view('dashboard.data.dataset.edit', [
            'dataset' => $dataset,
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
            'deskripsi' => 'required'
        ]);

        // Find the record in the database
        $dataset = Dataset::findOrFail($id);

        // Update fields
        $dataset->judul = $request->judul;
        $dataset->deskripsi = $request->deskripsi;
        // Save the updated record
        $dataset->save();

        // Show success message and redirect
        Alert::info('Success', 'Dataset has been updated!');
        return redirect('/admin/data-set');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deleteduser = Dataset::findOrFail($id);

            $deleteduser->delete();

            Alert::error('Success', 'Dataset has been deleted !');
            return redirect('/admin/data-set');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Dataset already used !');
            return redirect('/admin/data-set');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function getData()
    {
        $datasets = Dataset::orderBy('id', 'asc')->get();

        return view('dataset', [
            'datasets' => $datasets
        ]);
    }

    public function action($id)
    {
        $dataset = Dataset::findOrFail($id);
        $files = $dataset->files;

        return view('dataset-action', [
            'dataset' => $dataset,
            'files' => $files
        ]);
    }

    public function showFileData(Request $request)
    {
        $filePath = $request->get('file');  // Get selected file path from dropdown
        
        // Validate if file exists
        if (!File::exists($filePath)) {
            // return back()->with('error', 'File not found.');
            return response()->json(['data' => 'File not found 1 '.$request]);
        }

        $fileExtension = File::extension($filePath);
        
        // Process CSV file
        if ($fileExtension === 'csv') {
            $csvData = array_map('str_getcsv', file($filePath));
            // return view('dataset-action', ['data' => $csvData]);
            return response()->json(['data' => $data]);
        }

        // Process XLSX file
        elseif ($fileExtension === 'xlsx') {
            $data = Excel::toArray([], $filePath);
            // return view('dataset-action', ['data' => $data[0]]);
            return response()->json(['data' => $data]);
        }

        return response()->json(['data' => 'File not found 2']);
    }
}
