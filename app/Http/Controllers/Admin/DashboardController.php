<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\FileUnduh;
use App\Models\Foto;
use App\Models\Slide;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $beritaTerbaru = Berita::latest()->get();
        $beritas = Berita::all();
        $slides = Slide::all();
        $artikels = Artikel::all();
        $fileUnduhs = FileUnduh::all();
        $agendas = Agenda::all();
        $fotos = Foto::all();
        
        return view("admin.index",compact("beritaTerbaru","slides","fileUnduhs","artikels","beritas","agendas","fotos"));
    }
}
