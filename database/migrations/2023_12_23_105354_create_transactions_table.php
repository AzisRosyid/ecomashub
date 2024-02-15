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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('category_id');
            $table->enum('category', ['Kegiatan', 'Pesanan', 'Kas', 'Biaya', 'Hutang']);
            $table->double('value');
            $table->enum('type', ['Untung', 'Rugi']);
            $table->dateTime('date');
            $table->enum('status', ['Menunggu', 'Selesai']);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
