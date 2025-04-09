<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artikel;
use App\Models\Slide;
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
        $artikels = Artikel::all(); // Ambil semua data artikel
        return view('admin.index', compact('artikels',)); // Kirim data ke view
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
            "view" => "required|integer",
            "title" => "required|string",
            "isi" => "required|string",
        ], [
            "view.required" => "Jumlah tampilan harus diisi !",
            "view.integer" => "Jumlah tampilan harus berupa angka !",
            "title.required" => "Judul harus diisi !",
            "isi.required" => "Isi artikel harus diisi !",
        ]);

        // Menambahkan slug berdasarkan judul
        $validation['slug'] = Str::slug($request->title);

        // Menyimpan data artikel
        Artikel::create($validation);

        return back()->with("success", "Berhasil Menambahkan Artikel");
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
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

        // Menambahkan slug berdasarkan judul
        $validation['slug'] = Str::slug($request->title);

        // Memperbarui data artikel
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
