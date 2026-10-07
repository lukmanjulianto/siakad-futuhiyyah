<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// PRD Bab 10: riwayat belajar + mutasi (Bab 6.D)
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_academic_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('academic_year_id')->constrained();
            $table->foreignId('classroom_id')->nullable()->constrained()->nullOnDelete();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status', ['aktif', 'naik_kelas', 'tinggal_kelas', 'mutasi_keluar', 'lulus'])->default('aktif');
            $table->text('note')->nullable();
            $table->timestamps();
        });

        Schema::create('student_mutations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['masuk', 'keluar']);
            $table->string('school_name');
            $table->text('reason')->nullable();
            $table->date('mutation_date');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_mutations');
        Schema::dropIfExists('student_academic_histories');
    }
};
