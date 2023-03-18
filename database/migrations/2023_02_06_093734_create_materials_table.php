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
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('material_id');
            $table->foreignId('chapter_id')
                ->constrained('chapters', 'chapter_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('material_type_id')
                ->constrained('material_types', 'material_type_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->integer('material_number');
            $table->string('material_location', 255);
            $table->boolean('is_required')->default(false);
            $table->integer('max_points');
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
        Schema::dropIfExists('materials');
    }
};
