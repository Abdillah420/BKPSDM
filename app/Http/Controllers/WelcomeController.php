<?php
namespace App\Http\Controllers;

use App\Models\Berita; // Model Berita
use App\Models\Slide; // Model Slide
use App\Models\Artikel; // Model Artikel
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::all(); // Ambil semua data berita
        $slides = Slide::all(); // Ambil semua data slides
        $artikels = Artikel::all(); // Ambil semua data artikel
        return view('welcome', compact('beritas', 'slides', 'artikels')); // Kirim data ke view
    }
} 