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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            /* The status of the rental:
            PENDING: the reader started a rental process
            REJECTED: the librarian rejected the rental request
            ACCEPTED: the librarian has accepted the rental request, i.e. the book is at the reader
            RETURNED: the reader brought back the book, and the librarian approved it
            */
        	$table->enum('status', ['PENDING', 'ACCEPTED', 'REJECTED', 'RETURNED']); // (enum: PENDING, ACCEPTED, REJECTED, RETURNED)
        	// If the librarian accepts the rental request, he/she can specify a deadline by which the book must be returned to the library
        	$table->timestamp('deadline'); // (datetime, nullable)
        	// The time when the rental request (pending) became rejected or accepted
        	$table->timestamp('requestProcessedAt')->nullable(); // (datetime, nullable)
        	// The time when the librarian administered the return of the book
        	$table->timestamp('returnedAt')->nullable(); // (datetime, nullable)
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
        Schema::dropIfExists('rentals');
    }
};
