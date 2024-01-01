<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Closing extends Model
{
    protected $table = "closing";
    protected $fillable = ['tahun', 'bulan', 'pic'];
}
