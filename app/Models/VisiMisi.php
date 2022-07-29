<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class VisiMisi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['visi_misi_search'] ?? false, function ($query, $search) {
            return $query->where('isi_visi_misi', 'LIKE', '%' . $search . '%');
        });
    }
}
