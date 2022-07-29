<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeberatanInformasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['keberatan_informasi_search'] ?? false, function ($query, $search) {
            return $query->where('nomer_registrasi_permohonan_informasi', 'LIKE', '%' . $search . '%')
                ->orWhere('nama_lengkap', 'LIKE', '%' . $search . '%')
                ->orWhere('nama_lengkap_kuasa', 'LIKE', '%' . $search . '%');
        });
    }
}
