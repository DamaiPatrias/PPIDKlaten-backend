<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BerkalaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_dokumen_berkala' => $this->faker->name(),
            'link_dokumen_berkala' => $this->faker->url(),
            'nama_file_berkala' => $this->faker->name(),
        ];
    }
}
