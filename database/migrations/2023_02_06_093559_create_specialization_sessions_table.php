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
        Schema::create('specialization_sessions', function (Blueprint $table) {
            $table->bigIncrements('specialization_session_id');
            $table->foreignId('specialization_id')
                ->constrained('specializations', 'specialization_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('specialization_sessions');
    }
};
