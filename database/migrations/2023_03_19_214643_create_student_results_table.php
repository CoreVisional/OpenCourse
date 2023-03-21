<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_results', function (Blueprint $table) {
            $table->bigIncrements('student_result_id');
            $table->foreignId('material_id')
                ->constrained('materials', 'material_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('course_enrollment_id')
                ->constrained('course_enrollments', 'course_enrollment_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->integer('attempt');
            $table->string('attempt_link', 255)->nullable();
            $table->timestamp('started_on')->nullable();
            $table->timestamp('finished_on')->nullable();
            $table->integer('score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_results');
    }
};
