<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = ['nama_prodi', 'jurusan_id'];

    public function perguruanTinggi()
    {
        return $this->hasOne(PerguruanTinggi::class);
    }
}
