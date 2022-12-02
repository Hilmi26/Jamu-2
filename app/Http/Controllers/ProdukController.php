<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show data
        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('layouts.produk', compact('produk', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //input data
        $data = $request->all();
        $data['foto'] = Storage::put('img', $request->file('foto'));
        Produk::create($data);
        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk, $id)
    {
        //update data
        $produk = Produk::find($id);
        if ($request->file('foto')) {
            $file = $request->file('foto')->store('img');
            $produk->namaProduk = $request->namaProduk;
            $produk->harga = $request->harga;
            $produk->foto = $file;
            $produk->descProduk = $request->descProduk;
            $produk->kategori_id = $request->kategori_id;
            $produk->save();
        } else {
            $produk->namaProduk = $request->namaProduk;
            $produk->harga = $request->harga;
            $produk->foto;
            $produk->descProduk = $request->descProduk;
            $produk->kategori_id = $request->kategori_id;
            $produk->save();
        }
        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk, $id)
    {
        //delete data
        Produk::find($id)->delete();
        return redirect('produk');
    }
}
