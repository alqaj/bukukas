<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = "mutasi";
    protected $fillable = ["jenis_mutasi", 'kategori','jumlah','tanggal_transaksi','catatan', 'closing_id'];
}
