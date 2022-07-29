<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VisiMisiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isi_visi_misi' => $this->faker->sentence(),
            'jenis' => $this->faker->randomElement(['visi', 'misi'])
        ];
    }
}
