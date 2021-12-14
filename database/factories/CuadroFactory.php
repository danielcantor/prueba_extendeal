<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CuadroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstname,
            'painter' => $this->faker->name(),
            'country' => $this->faker->randomElement(['ARG','CLI','PER','ECU','VEN','COL']),
            'description' => $this->faker->text(),
        ];
    }
}
