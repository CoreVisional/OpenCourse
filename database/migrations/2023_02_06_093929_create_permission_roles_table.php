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
        Schema::create('permission_roles', function (Blueprint $table) {
            $table->bigIncrements('permission_role_id');
            $table->foreignId('role_id')
                ->constrained('roles', 'role_id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('permission_id')
                ->constrained('permissions', 'permission_id')
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
        Schema::dropIfExists('permission_roles');
    }
};
