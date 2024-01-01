<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Jenis;
use App\Models\Warna;
use App\Models\Biaya;

class InspectionController extends Controller
{
    public function index()
    {
        return view('website.pages.inspection.index');
    }

    public function create()
    {
        $jenis = Jenis::all();
        $warna = Warna::all();
        return view('website.pages.inspection.create', [
            'jenis' => $jenis,
            'warna' => $warna
        ]);
    }

    public function ajax_get_price_list(Request $request)
    {
        $price_list = Biaya::select('inspeksi.nama_inspeksi','biaya.*')
        ->join('inspeksi', 'biaya.inspeksi_id','inspeksi.id')
        ->where('jenis_id',$request->query('jenis'))->get();
        return $price_list;
    }
}
