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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->enum('category', ['Alat', 'Bahan', 'Properti']);
            $table->integer('quantity');
            $table->foreignId('unit_id')->constrained(table: 'asset_units', indexName: 'unit_id')->onUpdate('cascade')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('location');
            $table->enum('status', ['Tersedia', 'Dipinjam', 'Digunakan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
