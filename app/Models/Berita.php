<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        "view",
        "title",
        "isi",
        "penting",
        "slug",
        "image"
    ];

    protected $attributes = [
        'view' => 0,
        'penting' => 0
    ];
}

