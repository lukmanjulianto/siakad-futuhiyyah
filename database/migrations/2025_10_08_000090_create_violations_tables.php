<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// PRD Bab 10 + 6.I: kategori + pelanggaran (5 status) + konseling BK
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('violation_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('level', ['ringan', 'sedang', 'berat']);
            $table->integer('points');
            $table->text('sanction')->nullable();
            $table->timestamps();
        });

        Schema::create('violations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('violation_categories');
            $table->date('date');
            $table->text('description')->nullable();
            $table->integer('points');
            $table->enum('status', ['pending', 'verified_bk', 'followup_bk', 'followup_pondok', 'completed'])->default('pending');
            $table->foreignId('input_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('verified_by_bk')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('followup_by_bk')->nullable()->constrained('users')->nullOnDelete();
            $table->text('bk_note')->nullable();
            $table->timestamp('bk_followup_at')->nullable();
            $table->foreignId('followup_by_pondok')->nullable()->constrained('users')->nullOnDelete();
            $table->text('pondok_note')->nullable();
            $table->timestamp('pondok_followup_at')->nullable();
            $table->timestamps();
            $table->index(['student_id', 'date']);
        });

        Schema::create('counseling_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('violation_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('counselor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->date('session_date');
            $table->text('topic');
            $table->text('result')->nullable();
            $table->enum('status', ['open', 'monitoring', 'closed'])->default('open');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('counseling_notes');
        Schema::dropIfExists('violations');
        Schema::dropIfExists('violation_categories');
    }
};
