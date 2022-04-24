<?php

namespace Database\Seeders;

use App\Models\Rental;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        Rental::factory()->count(12)->create();

        // $rentalPending = Rental::factory()->create();
        // $rentalPending->status = 'PENDING';

        // $rentalAccepted = Rental::factory()->create();
        // $rentalAccepted->status = 'ACCECPTED';

        // $rentalRejected = Rental::factory()->create();
        // $rentalRejected->status = 'REJECTED';

        // $rentalReturned = Rental::factory()->create();
        // $rentalReturned->status = 'RETURNED';
    }
}
