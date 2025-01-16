<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Filedata;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FiledataController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function get($id)
    {
        $dataset = Dataset::findOrFail($id);
        $files = $dataset->files;
        
        return response()->json(['files' => $files]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data and the uploaded file
        $validated = $request->validate([
            'tahun' => 'required',
            'dataset_id' => 'required',
            'file' => 'required|file|mimes:csv,txt,xlsx|max:2048', // Ensure file type and size
        ]);
    
        // Get the uploaded file
        $file = $request->file('file'); // Ensure this matches the form input name
    
        // Generate a unique filename with timestamp
        $timestamp = now()->format('YmdHis'); // e.g., 20241130123045
        $fileName = $timestamp . '.' . $file->getClientOriginalExtension();
    
        // Define the upload path in the public directory
        $uploadPath = 'filedata';
    
        // Move the file to the specified directory
        $file->move(public_path($uploadPath), $fileName);
    
        // Save the file's name to the database along with other fields
        $filedata = new Filedata();
        $filedata->tahun = $request->tahun;
        $filedata->dataset_id = $request->dataset_id;
        $filedata->nama = $fileName; // Save only the file name to the database
        $filedata->save();
    
        // Add success alert and redirect
        Alert::success('Success', 'File has been saved!');
        return redirect('/admin/data-set');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedinfografis = Filedata::findOrFail($id);

            $deletedinfografis->delete();

            Alert::error('Success', 'File has been deleted !');
            return redirect('/admin/data-set');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, File already used !');
            return redirect('/admin/data-set');
        }
    }
}
