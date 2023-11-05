<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapRegistrasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri',
        'semester',
        'tahun',
        'tanggal',
        'status',
    ];

    protected $with = ['dataSantri'];

    public function dataSantri(){
        return $this->belongsTo(Santri::class, 'santri');
    }
}
