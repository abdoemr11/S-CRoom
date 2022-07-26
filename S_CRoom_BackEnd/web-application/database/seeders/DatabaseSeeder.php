<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Professor;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \Index\Models\User::factory(10)->create();
        Student::factory(10)->create();
        Professor::factory(10)->create();
        Subject::factory(10)->create(['professor_id'=>Professor::first()->id]);
        Admin::factory(5)->create();
        Student::first()->subjects()->attach(Subject::first()->id);
    }
}
