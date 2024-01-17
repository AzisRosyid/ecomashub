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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('user_role_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->enum('source_type', ['Internal', 'External']);
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->date('date_of_birth');
            $table->string('phone_number', 15);
            $table->string('address');
            $table->string('image')->nullable();
            $table->enum('status', ['Aktif', 'Menunggu', 'Blok']);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
