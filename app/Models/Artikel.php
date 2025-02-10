<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        "view",
        "title",
        "isi",
        "slug"
    ];
}

