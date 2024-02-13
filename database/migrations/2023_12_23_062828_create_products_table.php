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
            $table->foreignId('store_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->foreignId('category_id')->constrained(table: 'product_categories', indexName: 'category_id')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->double('weight');
            $table->enum('unit', ['Milligram', 'Gram', 'Kilogram']);
            $table->integer('stock');
            $table->double('price');
            $table->text('description')->nullable();
            $table->foreignId('image')->nullable()->constrained(table: 'media', indexName: 'image')->onUpdate('cascade')->onDelete('cascade');
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
