<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodis';

    protected $fillable = ['nama_prodi', 'keterangan', 'jurusan_id'];

    public function perguruanTinggi()
    {
        return $this->hasMany(PerguruanTinggi::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
