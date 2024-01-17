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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->foreignId('category_id')->constrained(table: 'product_categories', indexName: 'category_id')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('stock');
            $table->double('price');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
