<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function create()
    {
        return view("website.pages.kategori.create");
    }

    public function index()
    {
        $data = Kategori::all();
        return view("website.pages.kategori.index", ["data"=> $data]);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['jenis_mutasi' => 'required', 'nama_kategori'=> 'required']);

        $kategori = Kategori::create($request->all());
        return redirect()->route('website.kategori.index')->with('success','Sukses menambah data KATEGORI!');
    }
    
}
