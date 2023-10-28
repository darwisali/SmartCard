<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri',
        'saldo_awal',
        'debit',
        'kredit',
        'saldo',
    ];

    protected $with = ['dataSantri'];

    public function dataSantri(){
        return $this->belongsTo(Santri::class, 'santri');
    }
}
