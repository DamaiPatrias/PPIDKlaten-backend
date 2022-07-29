<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasWewenang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['tugas_wewenang_search'] ?? false, function ($query, $search) {
            return $query->where('isi_tugas_wewenang', 'LIKE', '%' . $search . '%');
        });
    }
}
