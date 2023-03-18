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
        Schema::create('institutions', function (Blueprint $table) {
            $table->bigIncrements('institution_id');
            $table->string('institution_name', 255);
            $table->string('institution_abbreviation', 3);
            $table->string('institution_website', 255)->nullable();
            $table->string('institution_email', 255);
            $table->string('dial_code', 3);
            $table->string('institution_phone', 25);
            $table->text('institution_address');
            $table->boolean('is_disabled')->default(false);
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
        Schema::dropIfExists('institutions');
    }
};
