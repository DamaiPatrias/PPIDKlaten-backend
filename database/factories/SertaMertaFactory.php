<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SertaMertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_dokumen_serta_merta' => $this->faker->name(),
            'link_dokumen_serta_merta' => $this->faker->url(),
            'nama_file_serta_merta' => $this->faker->name(),
        ];
    }
}
