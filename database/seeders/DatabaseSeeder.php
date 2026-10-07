<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database (PRD Task 2.2 — urutan FK aman).
     */
    public function run(): void
    {
        $this->call([
            RolesAndAdminSeeder::class,
            MasterSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
