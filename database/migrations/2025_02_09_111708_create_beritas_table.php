<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->integer("view")->default(0);  
            $table->string("title");
            $table->string("isi");
            $table->string("image");
            $table->boolean("penting")->default(0);  
            $table->string("slug")->unique();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.0
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
