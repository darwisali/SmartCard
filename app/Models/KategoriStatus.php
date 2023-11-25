<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'syahriyah',
        'pondok',
        'diniyah'
    ];
}
