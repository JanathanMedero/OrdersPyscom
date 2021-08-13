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

        DB::table('roles')->insert([
            'role' => 'Administrador',
        ]);

        DB::table('roles')->insert([
            'role' => 'Empleado',
        ]);

        User::factory(10)->create();

        Client::factory(50)->create();

        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Janathan Medero Pineda',
            'email' => 'webmaster@pyscom.com',
            'password' => Hash::make('password'),
        ]);

        $this->call(ClientSeeder::class);

    }
}
