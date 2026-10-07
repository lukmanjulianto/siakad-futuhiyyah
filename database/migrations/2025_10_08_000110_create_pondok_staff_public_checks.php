<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// PRD Bab 10: pengurus pondok + audit cek siswa publik (6.B)
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pondok_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('pondok_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('nik', 16)->nullable();
            $table->string('position')->nullable();
            $table->string('phone', 20)->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });

        Schema::create('public_student_checks', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 45);
            $table->string('nisn')->nullable();
            $table->string('name_search')->nullable();
            $table->boolean('success')->default(false);
            $table->timestamps();
            $table->index('ip_address');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('public_student_checks');
        Schema::dropIfExists('pondok_staff');
    }
};
