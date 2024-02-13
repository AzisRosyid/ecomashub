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
        Schema::create('entrusts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained(table: 'users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained(table: 'users')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantity');
            $table->double('price');
            $table->text('description')->nullable();
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrusts');
    }
};
