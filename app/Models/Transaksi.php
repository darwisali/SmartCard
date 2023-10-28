<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'type',
        'nominal',
        'tanggal',
    ];

    protected $with = ['dataSantri'];

    public function dataSantri(){
        return $this->belongsTo(Santri::class, 'santri_id');
    }
}
