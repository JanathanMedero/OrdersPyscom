<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = range(0,20);
        foreach ($arrays as $valor) {
          DB::table('clients')->insert([  
              'slug'        => 'client-'.rand(1,99999),             
              'name'        => 'Usuario-'.$valor,
              'rfc'         => Str::random(13),
              'phone'       => rand(1, 9999999999),
              'street'      => Str::random(15),
              'suburb'      => Str::random(15),
              'number'      => rand(1, 999),
              'postal_code' => rand(1, 99999),
          ]);
        }
    }
}
