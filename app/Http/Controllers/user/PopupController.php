<?php

namespace App\Http\Controllers\User;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PopupController extends Controller
{
    /**
     * Mengambil berita terbaru untuk pop-up.
     */
    public function getLatestNews()
    {
        $berita = Berita::latest()->first();
        return response()->json($berita);
    }
}
