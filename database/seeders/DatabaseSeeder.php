<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
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

        User::factory(10)->create();

        Client::factory(50)->create();

        DB::table('users')->insert([
            'name' => 'Janathan Medero Pineda',
            'email' => 'webmaster@pyscom.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('technicals')->insert([
            'name' => 'Eduardo de la Cruz Rojas',
        ]);
        DB::table('technicals')->insert([
            'name' => 'Hector Hiram Ramírez Calderon',
        ]);
        DB::table('technicals')->insert([
            'name' => 'Homero Patricio Acosta Perez',
        ]);

        $this->call(ClientSeeder::class);

    }
}
