<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SetiapSaatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_dokumen_setiap_saat' => $this->faker->name(),
            'link_dokumen_setiap_saat' => $this->faker->url(),
            'nama_file_setiap_saat' => $this->faker->name(),
        ];
    }
}
