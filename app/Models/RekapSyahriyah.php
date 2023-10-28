<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapSyahriyah extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri',
        'bulan',
        'tahun',
        'status',
    ];

    protected $with = ['dataSantri'];

    public function dataSantri(){
        return $this->belongsTo(Santri::class, 'santri');
    }
}
