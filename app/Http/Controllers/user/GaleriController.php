<?php

namespace App\Http\Controllers\User;

use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Foto;
use App\Models\Vidio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $galeris = Galeri::all(); // Ambil semua data galeri

        $fotos = Foto::all(); // Ambil semua data foto
        $vidios = Vidio::all(); // Ambil semua data video
        return view('galeri', compact( 'fotos', 'vidios')); // Tampilkan data di view galeri
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $galeri = galeri::where('slug', $slug)->firstOrFail(); // Ambil berita berdasarkan slug
        return view('galeri.show', compact('galeri')); // Tampilkan detail berita
    }
} 





