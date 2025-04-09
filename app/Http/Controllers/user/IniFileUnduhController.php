<?php

namespace App\Http\Controllers\User;

use App\Models\FileUnduh;
use App\Models\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF; // Import PDF facade

class IniFileUnduhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = FileUnduh::all(); // Ambil semua file unduh
        $beritas = Berita::all(); // Ambil semua berita
        return view('unduh', compact('files', 'beritas')); // Tampilkan data di view unduh
    }

    public function downloadPDF($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail(); // Ambil berita berdasarkan slug

        // Buat PDF
        try {
            $pdf = PDF::loadView('pdf.berita', compact('berita'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal membuat PDF: ' . $e->getMessage()], 500);
        }

        // Unduh PDF
        return $pdf->download('berita_' . $berita->id . '.pdf');
    }
};