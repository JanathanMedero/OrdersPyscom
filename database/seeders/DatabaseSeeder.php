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

        // User::factory(10)->create();

        // Client::factory(50)->create();

        DB::table('users')->insert([
            'role_id'   => 1,
            'name'      => 'Janathan Medero Pineda',
            'slug'      =>  Str::slug('Janathan Medero Pineda'),
            'email'     => 'webmaster@pyscom.com',
            'password'  => Hash::make('webmaster.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 1,
            'name'      => 'Jose Alberto Avalos',
            'slug'      =>  Str::slug('Jose Alberto Avalos'),
            'email'     => 'gerencia@pyscom.com',
            'password'  => Hash::make('gerencia.pyscom.2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Martha Mireya Paniagua Sánchez',
            'slug'      =>  Str::slug('Martha Mireya Paniagua Sánchez'),
            'email'     => 'administracion@pyscom.com',
            'password'  => Hash::make('administracion.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Catarina Alcocer Olivares',
            'slug'      =>  Str::slug('Catarina Alcocer Olivares'),
            'email'     => 'ventas@pyscom.com',
            'password'  => Hash::make('ventas.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Ana Manuela Bautista Cruz',
            'slug'      =>  Str::slug('Ana Manuela Bautista Cruz'),
            'email'     => 'pyscom@live.com.mx',
            'password'  => Hash::make('ana.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Eduardo de la Cruz Rojas',
            'slug'      =>  Str::slug('Eduardo de la Cruz Rojas'),
            'email'     => 'sistemas@pyscom.com',
            'password'  => Hash::make('sistemas.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Hector Hiram Ramírez Calderon',
            'slug'      =>  Str::slug('Hector Hiram Ramírez Calderon'),
            'email'     => 'hector@pyscom.com',
            'password'  => Hash::make('auxiliar.sistemas.pyscom'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Roberto Carlos Rodríguez Hernandez',
            'slug'      =>  Str::slug('Roberto Carlos Rodríguez Hernandez'),
            'email'     => 'logistica@pyscom.com',
            'password'  => Hash::make('logistica.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Anayelli Mendoza Rosas',
            'slug'      =>  Str::slug('Anayelli Mendoza Rosas'),
            'email'     => 'ventasvirrey@pyscom.com',
            'password'  => Hash::make('ventas.virrey.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Yareli Rojas Ferreyra',
            'slug'      =>  Str::slug('Yareli Rojas Ferreyra'),
            'email'     => 'ventas1@pyscom.com',
            'password'  => Hash::make('ventas.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Jessica Hernandez Pille',
            'slug'      =>  Str::slug('Jessica Hernandez Pille'),
            'email'     => 'adminvirrey@pyscom.com',
            'password'  => Hash::make('adminvirrey.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'María Monica Aavalos Villaseñor',
            'slug'      =>  Str::slug('María Monica Aavalos Villaseñor'),
            'email'     => 'gerenciavirrey@pyscom.com',
            'password'  => Hash::make('gerenciavirrey.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Homero Patricio Acosta Pérez',
            'slug'      =>  Str::slug('Homero Patricio Acosta Pérez'),
            'email'     => 'tivirrey@pyscom.com',
            'password'  => Hash::make('tivirrey.pyscom2021'),
        ]);

        DB::table('users')->insert([
            'role_id'   => 2,
            'name'      => 'Edgar García Gómez',
            'slug'      =>  Str::slug('Edgar García Gómez'),
            'email'     => 'edgar@pyscom.com',
            'password'  => Hash::make('edgar.pyscom2021'),
        ]);
    }
}
