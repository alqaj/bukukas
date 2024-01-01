<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mutasi;
use App\Models\Kategori;

class ClosingController extends Controller
{
    public function informasi()
    {
        return view("website.pages.closing.informasi");
    }

    public function input()
    {
        return view("website.pages.closing.input");
    }

    public function review(Request $request)
    {
        $this->validate($request, ['bulan' => 'required', 'tahun' => 'required'], );
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $data = Mutasi::join('kategori','mutasi.kategori','=','kategori.id')
        ->whereYear('tanggal_transaksi',$tahun)
        ->whereMonth('tanggal_transaksi',$bulan)
        ->get();
        // dd($data);
        if(count($data) < 1)
        {
            return redirect()->back()->with('error','Tidak ditemukan data!');
        }
        return view('website.pages.closing.review', ['data' => $data, 'tahun' => $tahun, 'bulan' => $bulan ]);
    }

    public function konfirmasi(Request $request)
    {
        $this->validate($request, ['bulan' => 'required', 'tahun' => 'required', 'total' => 'required'], );
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $total = $request->total;
        return view('website.pages.closing.eksekusi', ['total' => $total, 'tahun' => $tahun, 'bulan' => $bulan ]);
    }

    public function execute(Request $request)
    {
        $this->validate($request, ['bulan' => 'required', 'tahun' => 'required'], );
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $data = Mutasi::join('kategori','mutasi.kategori','=','kategori.id')
        ->whereYear('tanggal_transaksi',$tahun)
        ->whereMonth('tanggal_transaksi',$bulan)
        ->get();
        // dd($data);
        if(count($data) < 1)
        {
            return redirect()->back()->with('error','Tidak ditemukan data!');
        }
        return redirect()->route('website.closing.informasi')->with('success', 'Sukses');
    }
}
