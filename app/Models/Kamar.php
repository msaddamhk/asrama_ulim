<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $guarded = ['id'];

    public function aset()
    {
        return $this->hasMany(Aset::class, 'id_kamar');
    }

    public function pesananKamar()
    {
        return $this->hasMany(PesananKamar::class, 'id_kamar');
    }
}
