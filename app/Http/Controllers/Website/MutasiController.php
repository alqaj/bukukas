<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Mutasi;
use App\Models\Kategori;
use App\Models\Closing;
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
            ->join('users', 'mutasi.user_id','=','users.id')
            ->select('mutasi.*', 'kategori.id', 'kategori.nama_kategori', 'users.name')
            ->whereYear('tanggal_transaksi',$tahun)
            ->whereMonth('tanggal_transaksi',$bulan)
            ->get();
            return view('website.pages.mutasi.index', ['data'=> $data, 'bulan' => $bulan, 'tahun' => $tahun]);
        }
        return view("website.pages.mutasi.index", ['bulan' => 0, 'tahun' => 0]);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['jenis_mutasi' => 'required', 'kategori'=> 'required', 'jumlah'=> 'required', 'tanggal_transaksi'=> 'required|date']);

        $tanggalTransaksi = $request->input('tanggal_transaksi');
        $tahun = date('Y', strtotime($tanggalTransaksi));
        $bulan = date('n', strtotime($tanggalTransaksi));

        $existsInTableClosing = Closing::where('tahun', $tahun)
        ->where('bulan', $bulan)
        ->exists();

        if($existsInTableClosing)
        {
            return redirect()->back()->with('error','Maaf, sudah closing untuk bulan ' .$bulan . ' tahun ' . $tahun . '!');
        }
        $dataMutasi = $request->all();
        $dataMutasi['user_id']= Auth::user()->id;
        $mutasi = Mutasi::create($dataMutasi);
        return redirect()->route('website.mutasi.index')->with('success','Sukses menambah data transaksi anda!');
    }

    public function laporan(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        $data = Mutasi::join('kategori','mutasi.kategori','=','kategori.id')
            ->select('mutasi.*', 'kategori.nama_kategori')
            ->whereYear('tanggal_transaksi',$tahun)
            ->whereMonth('tanggal_transaksi',$bulan)
            ->get();
        $pdf = Pdf::loadView( 'website.pages.mutasi.laporan', compact(['bulan','tahun', 'data']))->setPaper('a4');
        return $pdf->stream();
    }
}
