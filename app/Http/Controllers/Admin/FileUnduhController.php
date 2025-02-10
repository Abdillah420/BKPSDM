<?php

namespace App\Http\Controllers\Admin;

use App\Models\FileUnduh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileUnduhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fileUnduhs = FileUnduh::all();
        return view('admin.index', compact('fileUnduhs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "nama" => "required|string",
            "deskripsi" => "required|string",
            "path" => "required|file"
        ],[
            "nama.required" => "Nama harus diisi !" ,
            "deskripsi.required" => "Deskripsi harus diisi !" ,
            "path.required" => "File harus diisi !" ,
        ]);

        if ($request->hasFile("path")) { 
            $file = $request->file("path");
            $fileName = $file->hashName();
            $file_path = $file->storeAs("file_unduhs", $fileName, 'public');
            $validation["path"] = $file_path;
        }

        // Debugging
     
        FileUnduh::create($validation);

        return back()->with("success","File Berhasil Menambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(FileUnduh $fileUnduh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FileUnduh $fileUnduh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FileUnduh $fileUnduh)
    {
        $validation = $request->validate([
            "nama" => "required|string",
            "path" => "required|string",
            "deskripsi" => "required|string"
        ]);

        if ($request->hasFile("path")) { 
            $file = $request->file("path");
            $fileName = $file->hashName();
            
            $file_path = $file->storeAs("file_unduhs", $fileName, 'public');
            $validation["path"] = $file_path;

            if (Storage::exists($fileUnduh->path)) {
                Storage::delete($fileUnduh->path);
            }
        }



        $fileUnduh->update($validation);

        return back()->with("success","Berhasil Menhapus");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FileUnduh $fileUnduh)
    {
        if (Storage::exists($fileUnduh->path)) {
            Storage::delete($fileUnduh->path);
        }

        $fileUnduh->delete();

        return back()->with("success","Berhasil Mengapus file ");
    }
}
