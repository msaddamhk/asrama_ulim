<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananKamar extends Model
{
    use HasFactory;

    protected $table = 'pesanan_kamar';
    protected $guarded = ['id'];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
