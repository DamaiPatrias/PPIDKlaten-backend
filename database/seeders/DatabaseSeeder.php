<?php

namespace Database\Seeders;

use App\Models\Berkala;
use App\Models\Carousel;
use App\Models\Dokumen;
use App\Models\KeberatanInformasi;
use App\Models\Maklumat;
use App\Models\PermohonanInformasi;
use App\Models\PpidPembantu;
use App\Models\SertaMerta;
use App\Models\SetiapSaat;
use App\Models\Struktur;
use App\Models\TeksBeranda;
use App\Models\TugasWewenang;
use App\Models\User;
use App\Models\VisiMisi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(4)->create();
        PermohonanInformasi::factory(10)->create();
        KeberatanInformasi::factory(10)->create();
        Berkala::factory(10)->create();
        SertaMerta::factory(10)->create();
        SetiapSaat::factory(10)->create();
        // Carousel::factory(5)->create();
        TeksBeranda::create([
            'judul_beranda' => 'Informasi Berkala',
            'teks_beranda' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has'"
        ]);
        TeksBeranda::create([
            'judul_beranda' => 'Informasi Serta Merta',
            'teks_beranda' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has'"
        ]);
        TeksBeranda::create([
            'judul_beranda' => 'Informasi Setiap Saat',
            'teks_beranda' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has'"
        ]);
        VisiMisi::factory(10)->create();
        TugasWewenang::factory(10)->create();
        Struktur::factory(10)->create();
        Maklumat::factory(10)->create();
        Dokumen::factory(10)->create();
        PpidPembantu::factory(10)->create();
    }
}
