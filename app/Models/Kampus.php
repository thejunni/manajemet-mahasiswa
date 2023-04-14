<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'nama_kampus',
        'alamat_kampus',
        'provinsi'
    ];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
}
