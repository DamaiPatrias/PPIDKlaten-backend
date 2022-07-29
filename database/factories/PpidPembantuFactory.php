<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PpidPembantuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_instansi' => $this->faker->name(),
            'link_instansi' => $this->faker->url(),

        ];
    }
}
