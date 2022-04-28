<?php

namespace Database\Seeders;

use App\Models\Rental;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rentals')->truncate();
        // Rental::factory()->count(12)->create();

        Rental::create([
            'status' => 'PENDING',
        	'deadline' => Carbon::now()->addDays(14),
    		'readerId' => '1',
    		'book_id' => '1',
        ]);

        Rental::create([
            'status' => 'ACCEPTED',
        	'deadline' => Carbon::now()->addDays(14),
    		'readerId' => '1',
    		'book_id' => '2',
        	'requestProcessedAt' => Carbon::now(),
    		'requestManagedBy' => '4',
        ]);

        Rental::create([
            'status' => 'ACCEPTED',
        	'deadline' => Carbon::now()->addDays(-1),
    		'readerId' => '1',
    		'book_id' => '3',
        	'requestProcessedAt' => Carbon::now(),
    		'requestManagedBy' => '2',
        ]);

        Rental::create([
            'status' => 'REJECTED',
        	'deadline' => Carbon::now()->addDays(-1),
    		'readerId' => '1',
    		'book_id' => '4',
        	'requestProcessedAt' => Carbon::now(),
    		'requestManagedBy' => '2',
        ]);

        Rental::create([
            'status' => 'RETURNED',
        	'deadline' => Carbon::now(),
    		'readerId' => '1',
    		'book_id' => '5',
        	'requestProcessedAt' => Carbon::now(),
    		'requestManagedBy' => '2',
        	'returnedAt' => Carbon::now(),
    		'returnManagedBy' => '4',
        ]);
    }
}
