<?php

namespace App\Http\Controllers\User;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all(); // Ambil semua berita
        return view('berita', compact('beritas')); // Tampilkan data di view berita
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail(); // Ambil berita berdasarkan slug
        return view('berita.show', compact('berita')); // Tampilkan detail berita
    }

    public function getLatestNews()
    {
        $berita = Berita::latest()->first(); // Ambil berita terbaru
        return response()->json($berita); // Kembalikan sebagai JSON
    }
} 