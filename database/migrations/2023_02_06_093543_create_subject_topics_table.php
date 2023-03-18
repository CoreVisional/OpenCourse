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
        Schema::create('subject_topics', function (Blueprint $table) {
            $table->bigIncrements('subject_topic_id');
            $table->foreignId('subject_id')
                ->constrained('subjects', 'subject_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('topic_id')
                ->constrained('topics', 'topic_id')
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
        Schema::dropIfExists('subject_topics');
    }
};
