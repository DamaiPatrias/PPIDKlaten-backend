<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SertaMerta extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'nama_dokumen_serta_merta',
        'link_dokumen_serta_merta',
        'nama_file_serta_merta'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['serta_merta_search'] ?? false, function ($query, $search) {
            return $query->where('nama_dokumen_serta_merta', 'LIKE', '%' . $search . '%');
        });
    }
}
