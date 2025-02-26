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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_title')->nullable(); // Nullable string
            $table->string('image')->nullable(); // Nullable string
            $table->longText('description')->nullable(); // Nullable longtext
            $table->string('price')->nullable(); // Nullable string
            $table->string('wifi')->default('yes'); // Default 'yes' string
            $table->string('room_type')->nullable(); // Nullable string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
