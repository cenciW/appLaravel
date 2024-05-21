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
        Schema::create('request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->date('dt_request');

            $table->unsignedInteger('user_project_id');
            $table->foreign('user_project_id')->references('id')->on('user_project')->onDelete('cascade');
            
            $table->unsignedInteger('status_request_id');
            $table->foreign('status_request_id')->references('id')->on('status_request')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request');
    }
};
