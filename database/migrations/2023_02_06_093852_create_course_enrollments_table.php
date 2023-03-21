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
        Schema::create('course_enrollments', function (Blueprint $table) {
            $table->bigIncrements('course_enrollment_id');
            $table->foreignId('student_id')
                ->constrained('students', 'student_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('course_session_id')
                ->constrained('course_sessions', 'course_session_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('status_id')
                ->constrained('statuses', 'status_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->date('enrollment_date');
            $table->decimal('final_grade', 3, 2)->nullable();
            $table->string('certificate_ID', 12)->nullable();
            $table->string('certificate_path', 255)->nullable();
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
        Schema::dropIfExists('course_enrollments');
    }
};
