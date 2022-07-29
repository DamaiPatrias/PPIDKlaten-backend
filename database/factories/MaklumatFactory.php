<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MaklumatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'maklumat' => $this->faker->text(),
        ];
    }
}
