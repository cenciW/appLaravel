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
        Schema::create('task', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedInteger('card_id');
            $table->foreign('card_id')->references('id')->on('card')->onDelete('cascade');
            $table->unsignedInteger('statustask_id');
            $table->foreign('statustask_id')->references('id')->on('statusTask')->onDelete('cascade');
            $table->unsignedInteger('priority_id');
            $table->foreign('priority_id')->references('id')->on('priority')->onDelete('cascade');
            $table->string('description');
            $table->date('dtStart');
            $table->date('dtEnd');
            $table->date('deadLine');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
