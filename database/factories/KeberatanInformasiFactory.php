<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KeberatanInformasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomer_registrasi_permohonan_informasi' => $this->faker->creditCardNumber(),
            'tujuan_penggunaan_informasi' => $this->faker->sentence(),
            'nama_lengkap' => $this->faker->name(),
            'email' => $this->faker->email(),
            'no_telp' => $this->faker->phoneNumber(),
            'pekerjaan' => $this->faker->jobTitle(),
            'alamat_lengkap' => $this->faker->address(),
            'nama_lengkap_kuasa' => $this->faker->name(),
            'email_kuasa' => $this->faker->email(),
            'no_telp_kuasa' => $this->faker->phoneNumber(),
            'pekerjaan_kuasa' => $this->faker->jobTitle(),
            'alamat_lengkap_kuasa' => $this->faker->address(),
            'link_surat_kuasa' => $this->faker->url(),
            'alasan_keberatan' => $this->faker->sentence(),
        ];
    }
}
