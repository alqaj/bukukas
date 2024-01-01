<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    protected $table = 'biaya';
    protected $fillable = ['inspeksi_id','jenis_id', 'biaya_ganti', 'biaya_repair'];
}
