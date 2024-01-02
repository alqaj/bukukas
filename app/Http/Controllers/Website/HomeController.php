<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mutasi;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index()
    {
        $thisYear = Carbon::now()->year;
        $data = Mutasi::join('kategori','kategori','=','kategori.id')
            ->select('mutasi.*')
            ->whereYear('tanggal_transaksi', $thisYear)
            ->get()
            ->toArray();
    
        return view('website.pages.home', ['data'=> $data, 'year' => $thisYear]);
    }
}
