<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// PRD Bab 10: guru & tendik + riwayat pendidikan
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->enum('gender', ['L', 'P']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('nik', 16)->unique();
            $table->string('kk_number', 20)->nullable();
            $table->string('mother_name')->nullable();
            $table->enum('religion', ['Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu'])->default('Islam');
            $table->enum('employment', ['PNS', 'PPPK', 'Non ASN'])->default('Non ASN');
            $table->string('nuptk')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('email_madrasah')->nullable();
            $table->text('email_madrasah_password')->nullable();
            $table->string('bpjs_kesehatan_id')->nullable();
            $table->string('bpjs_ketenagakerjaan_id')->nullable();
            $table->string('npwp')->nullable();
            $table->enum('blood_type', ['A', 'B', 'AB', 'O'])->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('residence_status')->nullable();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('regency_id')->nullable()->constrained('regencies')->nullOnDelete();
            $table->foreignId('district_id')->nullable()->constrained('districts')->nullOnDelete();
            $table->foreignId('village_id')->nullable()->constrained('villages')->nullOnDelete();
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->text('address')->nullable();
            $table->enum('status', ['aktif', 'mutasi_masuk', 'nonaktif', 'cuti'])->default('aktif');
            $table->decimal('distance_to_school', 5, 2)->nullable();
            $table->enum('marital_status', ['kawin', 'belum kawin', 'duda_janda'])->default('belum kawin');
            $table->string('spouse_name')->nullable();
            $table->enum('ptk_type', ['Guru', 'Tendik'])->default('Guru');
            $table->date('tmt_pegawai')->nullable();
            $table->date('tmt_guru')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('teacher_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained()->cascadeOnDelete();
            $table->enum('level', ['SD', 'MI', 'SMP', 'MTs', 'SMA', 'MA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3']);
            $table->string('institution_name')->nullable();
            $table->year('graduate_year')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teacher_educations');
        Schema::dropIfExists('teachers');
    }
};
