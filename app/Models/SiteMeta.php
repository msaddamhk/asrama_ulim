<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteMeta extends Model
{
    use HasFactory;
    protected $table = 'site_metas';
    protected $guarded = ['id'];
}
