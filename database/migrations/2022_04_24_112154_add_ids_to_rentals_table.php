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
        Schema::table('rentals', function (Blueprint $table) {
        	// The book to be borrowed
            $table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

            // The reader who would like to borrow it
        	$table->unsignedBigInteger('readerId')->nullable(); // (unsignedBigInteger, foreign, references:id, on:users)
            $table->foreign('readerId')->references('id')->on('users')->onDelete('cascade');

        	// Librarian id who administered the rental request
        	$table->unsignedBigInteger('requestManagedBy')->nullable(); // (unsignedBigInteger, nullable, foreign, references:id, on:users)
            $table->foreign('requestManagedBy')->references('id')->on('users')->onDelete('cascade');

        	// Librarian id who administered the return of the book
        	$table->unsignedBigInteger('returnManagedBy')->nullable(); // (unsignedBigInteger, nullable, foreign, references:id, on:users)
            $table->foreign('returnManagedBy')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropColumn('book_id');
            $table->dropColumn('readerId');
            $table->dropColumn('requestManagedBy');
            $table->dropColumn('returnManagedBy');
        });
    }
};
