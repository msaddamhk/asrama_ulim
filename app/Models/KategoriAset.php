<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAset extends Model
{
    use HasFactory;

    protected $table = 'kategori_aset';
    protected $guarded = ['id'];

    public function namaAset()
    {
        return $this->hasMany(NamaAset::class, 'kategori_aset_id');
    }
}
