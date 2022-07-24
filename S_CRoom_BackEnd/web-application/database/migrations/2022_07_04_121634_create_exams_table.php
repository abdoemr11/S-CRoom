<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('professor_id')->constrained('professors');
            $table->foreignId('subjects_id')->constrained('subjects');
            $table->enum('exam_type', ['final', 'quiz', 'midterm']);
            $table->integer('exam-mark');
            $table->date('exam_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('exam_max_degree');
            $table->integer('exam_min_degree');
            $table->string('exam_year');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
};
