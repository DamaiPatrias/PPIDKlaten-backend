<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PermohonanInformasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'email' => $this->faker->email(),
            'no_telp' => $this->faker->phoneNumber(),
            'pekerjaan' => $this->faker->jobTitle(),
            'alamat_lengkap' => $this->faker->address(),
            'nik' => $this->faker->creditCardNumber(),
            'link_ktp' => $this->faker->url(),
            'opd_tujuan' => $this->faker->randomElement(['Kominfo', 'Kemeskes', 'Dinas Pendidikan']),
            'rincian_informasi' => $this->faker->sentence(),
            'tujuan_informasi' => $this->faker->sentence(),
            'mendapatkan_informasi' => $this->faker->sentence(),
            'memperoleh_informasi' => $this->faker->sentence()
        ];
    }
}
