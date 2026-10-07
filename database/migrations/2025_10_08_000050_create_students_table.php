<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// PRD Bab 10 + 6.C: tabel siswa lengkap (identitas, ortu, alamat, aktivitas)
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 20)->unique();
            $table->string('nis_lokal', 6)->unique();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('photo')->nullable();
            $table->enum('citizenship', ['WNI', 'WNA'])->default('WNI');
            $table->string('nik', 16)->nullable();
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('gender', ['L', 'P']);
            $table->integer('siblings_count')->nullable();
            $table->integer('birth_order')->nullable();
            $table->enum('religion', ['Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu'])->default('Islam');
            $table->foreignId('pondok_id')->nullable()->constrained()->nullOnDelete();
            $table->string('aspiration')->nullable();
            $table->string('aspiration_custom')->nullable();
            $table->string('student_phone', 20)->nullable();
            $table->string('student_email')->nullable();
            $table->string('hobby')->nullable();
            $table->string('hobby_custom')->nullable();
            $table->string('kip_number')->nullable();
            $table->string('kk_number', 20)->nullable();
            $table->string('family_head_name')->nullable();
            $table->string('kk_file')->nullable();
            $table->string('kip_file')->nullable();
            $table->string('ijazah_sd_file')->nullable();
            $table->string('ijazah_smp_file')->nullable();
            $table->string('ijazah_nu_file')->nullable();

            $table->string('father_name')->nullable();
            $table->enum('father_status', ['masih hidup', 'sudah meninggal', 'tidak diketahui', 'cerai'])->nullable();
            $table->enum('father_citizenship', ['WNI', 'WNA'])->nullable();
            $table->string('father_nik', 16)->nullable();
            $table->string('father_birth_place')->nullable();
            $table->date('father_birth_date')->nullable();
            $table->string('father_education')->nullable();
            $table->string('father_job')->nullable();
            $table->string('father_job_custom')->nullable();
            $table->string('father_phone', 20)->nullable();

            $table->string('mother_name');
            $table->enum('mother_status', ['masih hidup', 'sudah meninggal', 'tidak diketahui', 'cerai'])->nullable();
            $table->enum('mother_citizenship', ['WNI', 'WNA'])->nullable();
            $table->string('mother_nik', 16)->nullable();
            $table->string('mother_birth_place')->nullable();
            $table->date('mother_birth_date')->nullable();
            $table->string('mother_education')->nullable();
            $table->string('mother_job')->nullable();
            $table->string('mother_job_custom')->nullable();
            $table->string('mother_phone', 20)->nullable();

            $table->string('parent_income_range')->nullable();
            $table->string('kks_number')->nullable();
            $table->string('pkh_number')->nullable();
            $table->string('kks_file')->nullable();
            $table->string('pkh_file')->nullable();

            $table->foreignId('parent_province_id')->nullable()->constrained('provinces')->nullOnDelete();
            $table->foreignId('parent_regency_id')->nullable()->constrained('regencies')->nullOnDelete();
            $table->foreignId('parent_district_id')->nullable()->constrained('districts')->nullOnDelete();
            $table->foreignId('parent_village_id')->nullable()->constrained('villages')->nullOnDelete();
            $table->string('parent_rt', 5)->nullable();
            $table->string('parent_rw', 5)->nullable();
            $table->text('parent_address')->nullable();

            $table->foreignId('student_province_id')->nullable()->constrained('provinces')->nullOnDelete();
            $table->foreignId('student_regency_id')->nullable()->constrained('regencies')->nullOnDelete();
            $table->foreignId('student_district_id')->nullable()->constrained('districts')->nullOnDelete();
            $table->foreignId('student_village_id')->nullable()->constrained('villages')->nullOnDelete();
            $table->string('student_rt', 5)->nullable();
            $table->string('student_rw', 5)->nullable();
            $table->text('student_address')->nullable();

            $table->foreignId('classroom_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('academic_year_id')->nullable()->constrained()->nullOnDelete();
            $table->date('enrollment_date')->nullable();
            $table->enum('entry_type', ['siswa_baru', 'mutasi_masuk'])->default('siswa_baru');
            $table->enum('status', ['aktif', 'aktif_mutasi_masuk', 'mutasi_keluar', 'lulus', 'nonaktif'])->default('aktif');
            $table->text('status_note')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['nisn', 'name']);
            $table->index('classroom_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
