<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mutasi;
use App\Models\Kategori;
class MutasiController extends Controller
{
    public function create()
    {
        $kategori = Kategori::all();
        return view("website.pages.mutasi.create",  ['kategori' => $kategori]);
    }

    public function kategori($jenis)
    {
        $kategori = Kategori::where('jenis_mutasi',$jenis)->get();
        return $kategori;
    }

    public function index(Request $request)
    {
        // dd($request->all());
        if($request->all())
        {
            $bulan = $request->bulan;
            $tahun = $request->tahun;
            $data = Mutasi::join('kategori','mutasi.kategori','=','kategori.id')
            ->whereYear('tanggal_transaksi',$tahun)
            ->whereMonth('tanggal_transaksi',$bulan)
            ->get();
            return view('website.pages.mutasi.index', ['data'=> $data, 'bulan' => $bulan, 'tahun' => $tahun]);
        }
        return view("website.pages.mutasi.index", ['bulan' => 0, 'tahun' => 0]);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['jenis_mutasi' => 'required', 'kategori'=> 'required', 'jumlah'=> 'required', 'tanggal_transaksi'=> 'required']);

        $mutasi = Mutasi::create($request->all());
        return redirect()->route('website.mutasi.index')->with('success','Sukses menambah data transaksi anda!');
    }
}
