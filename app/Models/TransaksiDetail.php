<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $fillable = ['transaksi_id','nama_inspeksi','biaya_id','jasa','kondisi','biaya'];
}
