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
        Schema::create('collaborations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['Mitra', 'Pemasok', 'Konsumen']);
            $table->string('email')->unique()->nullable();
            $table->string('phone_number', 15);
            $table->string('address');
            $table->foreignId('image')->nullable()->constrained(table: 'media')->onUpdate('cascade')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->enum('status', ['Aktif', 'Nonaktif']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborations');
    }
};
