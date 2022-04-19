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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('authors', 255);
            $table->string('description')->nullable();
            $table->timestamp('releasedAt');
            $table->string('coverImage', 255)->nullable();
            $table->integer('pages');
            $table->string('languageCode', 3)->default('hu');
            $table->string('isbn', 13)->unique()->nullable();
            $table->integer('inStock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
