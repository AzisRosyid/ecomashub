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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('organizer');
            $table->text('description')->nullable();
            $table->double('fund')->nullable();
            $table->foreignId('image')->nullable()->constrained(table: 'media', indexName: 'image')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('file')->nullable()->constrained(table: 'media', indexName: 'file')->onUpdate('cascade')->onDelete('cascade');
            $table->string('location')->nullable();
            $table->enum('type', ['Luring', 'Daring']);
            $table->integer('theme');
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
