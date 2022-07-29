<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TugasWewenangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isi_tugas_wewenang' => $this->faker->text(),
            'jenis' => $this->faker->randomElement(['tugas', 'wewenang'])
        ];
    }
}
