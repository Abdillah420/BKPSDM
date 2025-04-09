<?php

namespace App\Http\Controllers\User;

use App\Models\Artikel; // Pastikan model Artikel diimpor
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IniArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = Artikel::all(); // Ambil semua data artikel
        return view('artikel', compact('artikels')); // Tampilkan data di view artikel
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail(); // Ambil artikel berdasarkan slug
        return view('artikel.show', compact('artikel')); // Tampilkan detail artikel
    }
}
