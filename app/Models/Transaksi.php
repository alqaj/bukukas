<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['no_polisi','jenis_id','nama_jenis','warna_id','nama_warna','tanggal_transaksi','catatan','total_transaksi'];
}
