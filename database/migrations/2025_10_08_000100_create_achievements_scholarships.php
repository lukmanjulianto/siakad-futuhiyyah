<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// PRD Bab 10 + 6.J/6.C-tab5: prestasi + beasiswa
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->enum('level', ['madrasah', 'kkm', 'wilayah', 'provinsi', 'nasional']);
            $table->date('date');
            $table->string('organizer')->nullable();
            $table->text('description')->nullable();
            $table->string('certificate_file')->nullable();
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->foreignId('input_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });

        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->year('year');
            $table->enum('category', ['beasiswa_lainnya', 'beasiswa_berprestasi', 'beasiswa_miskin', 'beasiswa_miskin_berprestasi']);
            $table->string('name');
            $table->enum('institution_type', ['kemenag', 'kementerian_lain', 'pemda', 'bumn', 'bumd', 'swasta', 'yayasan', 'perorangan', 'lainnya'])->nullable();
            $table->string('institution_name')->nullable();
            $table->integer('duration_months')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarships');
        Schema::dropIfExists('achievements');
    }
};
