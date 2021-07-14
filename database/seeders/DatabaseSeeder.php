<?php

namespace Database\Seeders;

use Database\Seeders\ClientSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Janathan Medero Pineda',
            'email' => 'webmaster@pyscom.com',
            'password' => Hash::make('password'),
        ]);

        $this->call(ClientSeeder::class);
    }
}
