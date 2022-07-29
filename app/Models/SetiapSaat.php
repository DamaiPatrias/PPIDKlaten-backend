<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetiapSaat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['setiap_saat_search'] ?? false, function ($query, $search) {
            return $query->where('nama_dokumen_setiap_saat', 'LIKE', '%' . $search . '%');
        });
    }
}
