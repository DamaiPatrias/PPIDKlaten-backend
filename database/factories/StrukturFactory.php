<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StrukturFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pemangku_jabatan' => $this->faker->name(),
            'jabatan' => $this->faker->jobTitle(),
        ];
    }
}
