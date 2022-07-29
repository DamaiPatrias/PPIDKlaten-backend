<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarouselFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_gambar' => $this->faker->name(),
            'link_gambar' => $this->faker->url(),
            'nama_file_gambar' => $this->faker->name(),
            // 'text_gambar' => $this->faker->sentence(),
        ];
    }
}
