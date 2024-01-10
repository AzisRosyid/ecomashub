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
            $table->foreignId('user_id')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('organizer');
            $table->text('description');
            $table->double('fund')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('location')->nullable();
            $table->enum('type', ['Luring', 'Daring']);
            $table->integer('theme');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
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
