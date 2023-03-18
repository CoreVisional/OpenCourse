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
        Schema::create('instructors', function (Blueprint $table) {
            $table->bigIncrements('instructor_id');
            $table->foreignId('user_id')->nullable()
                ->constrained('users', 'user_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('institution_id')->nullable()
                ->constrained('institutions', 'institution_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('instructor_name', 255)->nullable();
            $table->string('instructor_title', 50);
            $table->string('instructor_department', 50);
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
        Schema::dropIfExists('instructors');
    }
};
