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
}
