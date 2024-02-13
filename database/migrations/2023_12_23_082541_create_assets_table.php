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
            $table->foreignId('store_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->enum('category', ['Alat', 'Bahan', 'Properti']);
            $table->integer('quantity');
            $table->foreignId('unit_id')->constrained(table: 'asset_units', indexName: 'unit_id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('location');
            $table->foreignId('image')->nullable()->constrained(table: 'media', indexName: 'image')->onUpdate('cascade')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->enum('status', ['Tersedia', 'Dipinjam', 'Digunakan']);
            $table->timestamps();
            $table->softDeletes();
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
