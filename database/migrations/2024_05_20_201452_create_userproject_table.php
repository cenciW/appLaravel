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
        Schema::create('user_project', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('permission')->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('personal_user')->onDelete('cascade');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
            $table->date('dt_admission');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_project');
    }
};
