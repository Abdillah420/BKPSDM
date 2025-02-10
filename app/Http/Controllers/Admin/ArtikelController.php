<?php

namespace App\Http\Controllers\Admin;

use App\Models\artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtikelController extends Controller
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
                // Validasi input dari form
                $validation = $request->validate([
                    "view" => "required|integer",  // Jumlah tampilan harus integer
                    "title" => "required|string",  // Judul harus berupa string
                    "isi" => "required|string",    // Isi artikel harus berupa string
                ],[
                    "view.required" => "Jumlah tampilan harus diisi !",
                    "view.integer" => "Jumlah tampilan harus berupa angka !",
                    "title.required" => "Judul harus diisi !",
                    "isi.required" => "Isi artikel harus diisi !",
                ]);
        
                if ($request->hasFile("path")) { 
                    $file = $request->file("path");
                    $foto = $file->hashName();
        

                    $foto_path = $file->storeAs("artikels", $foto, 'public');  
        
                    $validation["path"] = $foto_path;
                }

                $validation["slug"] = Str::slug($request->title);

                Artikel::create($validation);

                return back()->with("success", "Berhasil Menambahkan Artikel");
    }

    /**
     * Display the specified resource.
     */
    public function show(artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        // Validasi input dari form
        $validation = $request->validate([
            "view" => "required|integer",  
            "title" => "required|string",  
            "isi" => "required|string",
        ]);

        $validation['slug'] = Str::slug($request->title);
        $artikel->update($validation);

        return back()->with("success", "Artikel berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();


        return back()->with("success", "Artikel berhasil dihapus");
    }
}
