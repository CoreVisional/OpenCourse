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
    public function up() : void
    {
        Schema::create('course_instructors', function (Blueprint $table) {
            $table->bigIncrements('course_instructor_id');
            $table->foreignId('course_id')
                ->constrained('courses', 'course_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('instructor_id')
                ->constrained('instructors', 'instructor_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('course_instructors');
    }
};
