<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'time' => '12:00',
            'date' => $this->faker->dateTimeBetween(now(),now()->addDays(20))
        ];
    }
}
