<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\FileUnduh;
use App\Models\Slide;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $beritaTerbaru = Berita::latest()->get();
        $beritas = Berita::all();
        $slides = Slide::all();
        $fileUnduhs = FileUnduh::all();
        $artikels = Artikel::all();
        
        return view("admin.index",compact("beritaTerbaru","slides","fileUnduhs","artikels","beritas"));
    }
}
