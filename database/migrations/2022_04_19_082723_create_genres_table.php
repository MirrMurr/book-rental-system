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
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('style', ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark']);
            $table->timestamps();
        });

        Schema::create('book_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('book_id');
            $table->timestamps();

            $table->unique(['book_id', 'genre_id']);
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_genre');
        Schema::dropIfExists('genres');
    }
};
