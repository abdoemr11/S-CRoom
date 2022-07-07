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
        Schema::create('bonuses', function (Blueprint $table) {
            $table->id('bonus_id');

            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('professor_id')->constrained('professor');
            $table->foreignId('lecture_id')->constrained('lecture');

            $table->decimal('bonus_value');
            $table->timestamp();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonuses');
    }
};
