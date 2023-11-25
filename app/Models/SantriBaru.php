<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantriBaru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'uid',
        'nama',
        'status',
        'masa_aktif',
        'pendaftaran',
        'infaq',
        'posaba',
        'kartu_santri',
        'seragam',
        'syahriyah',
        'pondok',
        'diniyah'
    ];

    protected $with = ['k_status'];

    /**
     * Get the user that owns the SantriBaru
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function k_status()
    {
        return $this->belongsTo(KategoriStatus::class, 'status');
    }
}
