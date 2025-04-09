<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // Jika Anda memiliki kolom tertentu yang dapat diisi, Anda bisa mendefinisikannya di sini
    protected $fillable = ['title', 'description', 'image_path'];
}
