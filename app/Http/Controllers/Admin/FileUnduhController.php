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
        //
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
            "path" => "required|string"
        ],[
            "nama.required" => "nama harus diisi !" ,
            "deskripsi.required" => "deskripsi harus di isi !" ,
            "path.image" => "Ekstension gambar tidak valid !" ,
            "path.required" => " harus diisi! !" ,
        ]);

        if ($request->hasFile("path")) { 
            $file = $request->file("path");
            $foto = $file->hashName();

            $foto_path = $file->storeAs("path", $foto);
            $foto_path = Storage::disk("public")->put("file_unduhs", $file);
            $validation["path"] = $foto_path;
        }


        FileUnduh::create($validation);

        return back()->with("success"," file Berhasil Menambahkan");
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
            $foto = $file->hashName();
            
            $foto_path = $file->storeAs("file_unduhs", $foto);
            $foto_path = Storage::disk("public")->put("file_unduhs", $file);
            $validation["path"] = $foto_path;

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
