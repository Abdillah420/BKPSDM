<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::all(); // Ambil semua agenda
        return view('admin.index', compact('agendas')); // Kirim data ke view
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
        "tanggal" => "required|date",   
        "title" => "required|string", 
    ],[
        "tanggal.required" => "Tanggal harus diisi !",
        "tanggal.date" => "Tanggal tidak valid !", 
        "title.required" => "Judul harus diisi !",
    ]);

    // Menyimpan data agenda ke dalam database
    Agenda::create($validation);

    return back()->with("success", "Berhasil Menambahkan");
}


    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $validation = $request->validate([
            "tanggal" => "required|date",   
            "title" => "required|string",  
        ],[
            "tanggal.required" => "Tanggal harus diisi !",
            "tanggal.date" => "Tanggal tidak valid !", 
            "title.required" => "Judul harus diisi !",
        ]);
    

        $agenda->update($validation);
    
        return back()->with("success", "Berhasil Memperbarui Agenda");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return back()->with("success", "Berhasil Menghapus Agenda");
    }
}
