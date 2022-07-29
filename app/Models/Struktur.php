<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['struktur_search'] ?? false, function ($query, $search) {
            $query->where('pemangku_jabatan', 'LIKE', '%' . $search . '%')
                ->orWhere('jabatan', 'LIKE', '%' . $search . '%');
        });
    }
}
