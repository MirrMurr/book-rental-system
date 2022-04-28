<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'Reader Johnes',
            'email' => 'reader@brs.com',
            'password' => Hash::make('password'),
            'role' => 'reader'
        ]);

        User::create([
            'name' => 'Librarian Smith',
            'email' => 'librarian@brs.com',
            'password' => Hash::make('password'),
            'role' => 'librarian'
        ]);

        User::create([
            'name' => 'Reader Leona',
            'email' => 'reader2@brs.com',
            'password' => Hash::make('password'),
            'role' => 'reader'
        ]);

        User::create([
            'name' => 'Librarian Harold',
            'email' => 'librarian2@brs.com',
            'password' => Hash::make('password'),
            'role' => 'librarian'
        ]);
    }
}
