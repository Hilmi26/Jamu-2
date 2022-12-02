<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('layouts.rekom');
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
        //object
        $rekom = new Rekom($request->nama, $request->tahun, $request->keluhan);
        $data = [
            'nama' => $rekom->nama,
            'keluhan' => $rekom->keluhan,
            'umur' => $rekom->hitungUmur(),
            'namaJamu' => $rekom->namaJamu(),
            'saran' => $rekom->saran(),
        ];
        return view('layouts.rekom', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class Data
{
    public $nama, $tahun, $keluhan;
    public function __construct($nama, $tahun, $keluhan)
    {
        $this->nama = $nama;
        $this->tahun = $tahun;
        $this->keluhan = $keluhan;
    }
    public function hitungUmur()
    {
        return 2022 - $this->tahun;
    }
}

class Rekom extends Data
{
    public function namaJamu()
    {
        if ($this->keluhan == 'Keseleo' || $this->keluhan == 'Kurang nafsu') {
            return 'Beras Kencur';
        } elseif ($this->keluhan == 'Pegal-pegal') {
            return 'Kunyit Asam';
        } elseif ($this->keluhan == 'Darah tinggi' || $this->keluhan == 'Gula darah') {
            return 'Brotowali';
        } elseif ($this->keluhan == 'Kram perut' || $this->keluhan == 'Masuk angin') {
            return 'Temulawak';
        } else {
            return 'Keluhan tidak terdaftar';
        }
    }

    public function saran()
    {
        if ($this->hitungUmur() <= 10) {
            return 'Dikomsumsi 1x';
        } elseif ($this->hitungUmur() > 10 && $this->namaJamu() == 'Beras Kencur' && $this->keluhan == 'Keseleo') {
            return 'Dioleskan';
        } else {
            return 'Dikonsumsi 2x';
        }
    }
}

//
