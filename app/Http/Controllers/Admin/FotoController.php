<?php

namespace App\Http\Controllers\Admin;

use App\Models\Foto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotos = Foto::all(); // Ambil semua foto
        return view('admin.foto.index', compact('fotos')); // Kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.foto.create'); // Tampilkan form untuk menambah foto
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "path" => "required|image",
            "title" => "required|string",
            "tanggal" => "required|date"
        ],[
            "path.required" => "Gambar harus diisi !" ,
            "path.image" => "Ekstension gambar tidak valid !" ,
            "title.required" => "Judul harus diisi! !" ,
            "tanggal.required" => "Tanggal harus diisi !",
            "tanggal.date" => "Tanggal tidak valid !"
        ]);

        if ($request->hasFile("path")) { 
            $file = $request->file("path");
            $foto = $file->hashName();

            $foto_path = $file->storeAs("fotos", $foto, 'public');
            $validation["path"] = $foto_path;
        }

        $validation["tanggal"] = $request->tanggal;

        Foto::create($validation);

        return back()->with("success","Berhasil Menambahkan Foto");
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        return view('admin.foto.show', compact('foto')); // Tampilkan detail foto
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        return view('admin.foto.edit', compact('foto')); // Tampilkan form untuk mengedit foto
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto $foto)
    {
        $validation = $request->validate([
            "path" => "nullable|image",
            "title" => "required|string"
        ]);

        if ($request->hasFile("path")) { 
            $file = $request->file("path");
            $fotoName = $file->hashName();
            
            $foto_path = $file->storeAs("fotos", $fotoName, 'public');
            $validation["path"] = $foto_path;

            if (Storage::exists($foto->path)) {
                Storage::delete($foto->path);
            }
        }

        $foto->update($validation);

        return back()->with("success","Berhasil Mengupdate Foto");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {
        if (Storage::exists($foto->path)) {
            Storage::delete($foto->path);
        }
        
        $foto->delete();

        return back()->with("success","Berhasil Menghapus Foto");
    }
}
