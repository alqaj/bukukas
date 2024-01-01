<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mutasi;
use App\Models\Closing;
use App\Models\Kategori;
use Carbon\Carbon;
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
        $closingIsExist = Closing::where('bulan', $bulan)->where('tahun', $tahun)->exists();
        if($closingIsExist)
        {
            return redirect()->back()->with('error','Maaf, sudah pernah dilakukan closing!');
        }
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
        $closingIsExist = Closing::where('bulan', $bulan)->where('tahun', $tahun)->exists();
        if($closingIsExist)
        {
            return redirect()->back()->with('error','Maaf, sudah pernah dilakukan closing!');
        }
        $data = Mutasi::join('kategori','mutasi.kategori','=','kategori.id')
        ->whereYear('tanggal_transaksi',$tahun)
        ->whereMonth('tanggal_transaksi',$bulan)
        ->get();
        
        if(count($data) < 1)
        {
            return redirect()->back()->with('error','Tidak ditemukan data!');
        }


        try {
            DB::transaction(function () use ($tahun, $bulan, $data) {
                // Step 1: Membuat Closing
                $closing = Closing::create([
                    'tahun' => $tahun,
                    'bulan' => $bulan,
                ]);
        
                // Step 2: Menyimpan data terkait
                $saldo = 0;
                foreach ($data as $d) {
                    $d->closing_id = $closing->id;
                    $d->save();

                    if($d->jenis_mutasi == 'masuk')
                    {
                        $saldo += $d->jumlah;
                    }
                    else
                    {
                        $saldo -= $d->jumlah;
                    }
                }

                //Insert Data Mutasi untuk SAldo Bulan lalu
                $kategori = Kategori::where('nama_kategori', 'like','%' . 'Sisa saldo' . '%')->first();

                $mutasi = Mutasi::create([
                    'jenis_mutasi' => 'masuk',
                    'kategori' => $kategori->id,
                    'jumlah' => $saldo,
                    'tanggal_transaksi' => Carbon::now()->startOfMonth(),
                    'catatan' => 'Sisa saldo bulan ' . $bulan . ' tahun ' . $tahun,
                ]);

            });
        
            // Jika berhasil, redirect atau berikan respons positif
            return redirect()->route('website.closing.informasi')->with('success', 'Sukses');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, redirect atau berikan pesan kesalahan
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }
}
