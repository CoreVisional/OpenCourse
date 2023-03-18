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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('course_id');
            $table->foreignId('specialization_id')
                ->constrained('specializations', 'specialization_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('course_name', 255);
            $table->text('course_description');
            $table->string('course_image', 255);
            $table->string('course_commitment', 12);
            $table->decimal('minimum_grade', 3, 2);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('courses');
    }
};
