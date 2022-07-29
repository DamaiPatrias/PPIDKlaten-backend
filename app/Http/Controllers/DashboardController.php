<?php

namespace App\Http\Controllers;

use App\Models\Berkala;
use App\Models\KeberatanInformasi;
use App\Models\PermohonanInformasi;
use App\Models\SertaMerta;
use App\Models\SetiapSaat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard/dashboard', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'data_berkala' => Berkala::count(),
            'data_serta_merta' => SertaMerta::count(),
            'data_setiap_saat' => SetiapSaat::count(),
            'data_permohonan_informasi' => PermohonanInformasi::latest()->paginate(5),
            'data_keberatan_informasi' => KeberatanInformasi::latest()->paginate(5)
        ]);
    }
}
