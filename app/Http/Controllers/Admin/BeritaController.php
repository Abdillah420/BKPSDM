<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all(); // Ambil semua berita
        return view('admin.berita.index', compact('beritas')); // Tampilkan data di view
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

        // Validasi input
        $validation = $request->validate([
            "title" => "required|string|max:255",
            "isi" => "required|string",
            "penting" => "nullable|boolean",
            "image" => "required|image|mimes:jpeg,png,jpg,gif"
        ],[
            "title.required" => "Judul harus diisi!",
            "isi.required" => "Isi berita harus diisi!",
            "image.required" => "Gambar harus diisi!",
            "image.image" => "File harus berupa gambar!"
        ]);

        // Menangani file gambar
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $foto = $file->hashName();
            $foto_path = $file->storeAs("beritas", $foto, 'public');
            $validation["image"] = $foto_path;
        }

        // Set nilai default
        $validation["penting"] = $request->has('penting') ? 1 : 0;
        $validation["view"] = 0;
        $validation['slug'] = Str::slug($request->title);

        
        // Simpan ke database
        Berita::create($validation);

        return back()->with("success", "Berita berhasil ditambahkan!");
    }

     /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
            
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $validation = $request->validate([
            "path" => "nullable|image",
            "title" => "required|string",
            "isi" => "required|string",
            "slug" => "required|string|unique:beritas,slug," . $berita->id,
            "penting" => "nullable|boolean"
        ]);

        if ($request->hasFile("path")) {
            $file = $request->file("path");
            $foto = $file->hashName();
            
            $foto_path = $file->storeAs("beritas", $foto);
            $foto_path = Storage::disk("public")->put("beritas", $file);
            $validation["path"] = $foto_path;

            if (Storage::exists($berita->path)) {
                Storage::delete($berita->path);
            }
        }

        $validation["penting"] = $request->has('penting') ? 1 : 0;

        $berita->update($validation);

        return back()->with("success", "Berhasil Mengupdate Berita");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        // Hapus gambar dari storage jika ada
        if ($berita->image && Storage::exists($berita->image)) {
            Storage::delete($berita->image);
        }

        // Hapus berita dari database
        $berita->delete();

        return back()->with("success", "Berhasil Menghapus Berita");
    }

    public function latest()
    {
        $beritas = Berita::orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome', compact('beritas'));
    }
}
