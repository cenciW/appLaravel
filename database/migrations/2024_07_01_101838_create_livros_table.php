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
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('titulo',100);
            $table->string('ano_edicao',5);
            $table->string('area',100);
            $table->integer('autor_id')->unsigned(); // Add foreign key column
            $table->integer('editora_id')->unsigned(); // Add foreign key column
            
            $table->foreign('autor_id')->references('id')->on('autors')->onDelete('cascade'); // Define foreign key relationship
            $table->foreign('editora_id')->references('id')->on('editoras')->onDelete('cascade'); // Define foreign key relationship
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
