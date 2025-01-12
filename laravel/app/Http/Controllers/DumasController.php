<?php

namespace App\Http\Controllers;

use App\Models\KategoriDumas;
use App\Models\Dumas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Mail\DumasMailable;
use Illuminate\Support\Facades\Mail;

class DumasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function aduan()
    {
        $dumass = Dumas::orderBy('id', 'asc')->get();

        return view('dashboard.dumas.aduan', [
            'dumass' => $dumass
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function show_page()
    {
        $kategoridumass = KategoriDumas::orderBy('id', 'asc')->get();

        return view('aduan-masyarakat', [
            'kategoridumass' => $kategoridumass
        ]);
    }

    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subjek' => 'required|exists:kategori_dumas,id',
            'pesan' => 'required|string',
            'lampiran' => 'nullable|file|mimes:jpg,png,pdf,docx', // Adjust allowed file types and size
        ]);
    
        // Handle file upload
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $timestamp = now()->format('YmdHis'); // Generate timestamp
            $fileName = $timestamp . '.' . $file->getClientOriginalExtension(); // Append original filename
            // Define the upload path in the public directory
            $uploadPath = 'lampirans';
            // Move the file to the specified directory
            $file->move(public_path($uploadPath), $fileName);
    
            // Save the data (example for a "Dumas" model)
            Dumas::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'subjek' => (int) $request->input('subjek'),
                'pesan' => $request->input('pesan'),
                'lampiran' => $fileName,
            ]);

            $data = [
                'name' => 'Info Bimas Katolik',
                'sender' => $request->input('email'),
                'message' => $request->input('pesan')
            ];

            Mail::to('info.bimaskatolik@kemenag.go.id')->send(new YourMailable($data));
            
            // Redirect or return response
            return redirect()->back()->with('success', 'Aduan berhasil dikirim.');
        } else {
            // Save the data (example for a "Dumas" model)
            Dumas::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'subjek' => (int) $request->input('subjek'),
                'pesan' => $request->input('pesan'),
                'lampiran' => null,
            ]);

            $data = [
                'name' => 'Info Bimas Katolik',
                'sender' => $request->input('email'),
                'message' => $request->input('pesan')
            ];
    
            Mail::to('info.bimaskatolik@kemenag.go.id')->send(new DumasMailable($data));

            // Redirect or return response
            return redirect()->back()->with('success', 'Aduan berhasil dikirim.');
        }
    
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoridumass = KategoriDumas::orderBy('id', 'asc')->get();

        return view('dashboard.dumas.index', [
            'kategoridumass' => $kategoridumass
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dumas.add');
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

        $kategoridumas = KategoriDumas::create($validated);
    
        // Add success alert and redirect
        Alert::success('Success', 'Kategori Aduan Masyarakat has been saved!');
        return redirect('/dumas/subjek');
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
        $kategoridumas = KategoriDumas::findOrFail($id);

        return view('dashboard.dumas.edit', [
            'kategoridumas' => $kategoridumas,
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
        $kategoridumas = KategoriDumas::findOrFail($id);

        // Update fields
        $kategoridumas->name = $request->name;
        $kategoridumas->deskripsi = $request->deskripsi;
        // Save the updated record
        $kategoridumas->save();

        // Show success message and redirect
        Alert::info('Success', 'Kategori Aduan Masyarakat has been updated!');
        return redirect('/dumas/subjek');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedkategoridumas = KategoriDumas::findOrFail($id);

            $deletedkategoridumas->delete();

            Alert::error('Success', 'Kategori Aduan Masyarakat has been deleted !');
            return redirect('/dumas/subjek');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Layanan already used !');
            return redirect('/dumas/subjek');
        }
    }
}
