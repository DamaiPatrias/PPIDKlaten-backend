<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkala extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $fillters)
    {
        $query->when($fillters['berkala_search'] ?? false, function ($query, $search) {
            return $query->where('nama_dokumen_berkala', 'LIKE', '%' . $search . '%');
        });
    }
}
