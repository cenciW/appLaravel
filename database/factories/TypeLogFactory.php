<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TypeLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //tipo enum: 0 - project / 1 - card / 2 - task
        return [
            'type' => $this->faker->unique()->word(),
        ];
    }
}
