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
        Schema::create('chapters', function (Blueprint $table) {
            $table->bigIncrements('chapter_id');
            $table->integer('chapter_no');
            $table->string('chapter_name', 255);
            $table->text('chapter_description');
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
        Schema::dropIfExists('chapters');
    }
};
