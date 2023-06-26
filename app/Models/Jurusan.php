<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';

    protected $fillable = [
        'namaJurusan',
    ];

    public function prodis()
    {
        return $this->hasMany(Prodi::class);
    }
}
