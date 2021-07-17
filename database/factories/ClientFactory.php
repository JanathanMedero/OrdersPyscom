<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug'          => $this->faker->numerify('client-#####'),
            'name'          => $this->faker->name(),
            'rfc'           => $this->faker->randomNumber(9, true),
            'phone'         => $this->faker->randomNumber(9, true),
            'street'        => Str::random(15),
            'suburb'        => Str::random(15),
            'number'        => $this->faker->randomNumber(3, true),
            'postal_code'   => $this->faker->randomNumber(5, true),
            'created_at'    => $this->faker->dateTime(),
        ];
    }
}
