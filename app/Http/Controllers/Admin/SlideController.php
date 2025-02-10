<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "path" => "required|image",
            "title" => "required|string"
        ],[
            "path.required" => "Gambar harus diisi !" ,
            "path.image" => "Ekstension gambar tidak valid !" ,
            "title.required" => "Judul harus diisi! !" ,
        ]);

        if ($request->hasFile("path")) { 
            $file = $request->file("path");
            $foto = $file->hashName();

            $foto_path = $file->storeAs("slides", $foto);
            $foto_path = Storage::disk("public")->put("slides", $file);
            $validation["path"] = $foto_path;
        }


        Slide::create($validation);

        return back()->with("success","Berhasil Menambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        $validation = $request->validate([
            "path" => "required|image",
            "title" => "required|string"
        ]);

        if ($request->hasFile("path")) { 
            $file = $request->file("path");
            $foto = $file->hashName();
            
            $foto_path = $file->storeAs("slides", $foto);
            $foto_path = Storage::disk("public")->put("slides", $file);
            $validation["path"] = $foto_path;

            if (Storage::exists($slide->path)) {
                Storage::delete($slide->path);
            }
        }



        $slide->update($validation);

        return back()->with("success","Berhasil Menhapus");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        if (Storage::exists($slide->path)) {
            Storage::delete($slide->path);
        }
        
        $slide->delete();

        return back()->with("success","Berhasil Menhapus");
    }
}
