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
        Schema::create('cashes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->foreignId('collaboration_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->double('value');
            $table->enum('type', ['Sekali', 'Rutin']);
            $table->dateTime('date_start');
            $table->dateTime('date_end')->nullable();
            $table->integer('interval')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_updated')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashes');
    }
};
