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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->double('down_payment');
            $table->text('description')->nullable();
            $table->dateTime('date_start')->nullable();
            $table->datetime('date_end')->nullable();
            $table->enum('status', ['Pengajuan', 'Proses', 'Selesai']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
