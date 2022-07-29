<?php

namespace App\Http\Controllers;

use App\Models\KeberatanInformasi;
use Illuminate\Http\Request;

class KeberatanInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/pengajuan_informasi/keberatan_informasi/keberatan_informasi', [
            'title' => 'Keberatan Informasi',
            'active' => 'keberatan_informasi',
            'data_keberatan_informasi' => KeberatanInformasi::orderBy('id')->filter(request(['keberatan_informasi_search']))->paginate(25),
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KeberatanInformasi  $keberatanInformasi
     * @return \Illuminate\Http\Response
     */
    public function show(KeberatanInformasi $keberatanInformasi)
    {
        return view('pengajuan_informasi/keberatan_informasi/show', [
            'title' => 'Detail Keberatan Informasi',
            'active' => 'keberatan_informasi',
            'data_keberatan_informasi' => $keberatanInformasi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KeberatanInformasi  $keberatanInformasi
     * @return \Illuminate\Http\Response
     */
    public function edit(KeberatanInformasi $keberatanInformasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KeberatanInformasi  $keberatanInformasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KeberatanInformasi $keberatanInformasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KeberatanInformasi  $keberatanInformasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(KeberatanInformasi $keberatanInformasi)
    {
        //
    }
}
