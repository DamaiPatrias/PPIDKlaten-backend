<?php

namespace App\Http\Controllers;

use App\Models\TugasWewenang;
use Illuminate\Http\Request;

class TugasWewenangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/profil/tugas_wewenang/tugas_wewenang', [
            'title' => 'Tugas Wewenang',
            'active' => 'tugas_wewenang',
            'data_tugas_wewenang' => TugasWewenang::orderBy('id')->filter(request(['tugas_wewenang_search']))->paginate(50),
            // 

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
        $validateTugasWewenang = $request->validate([
            'isi_tugas_wewenang' => 'required',
            'jenis' => 'required',
        ]);

        TugasWewenang::create($validateTugasWewenang);

        return redirect('/tugas-wewenang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TugasWewenang  $tugasWewenang
     * @return \Illuminate\Http\Response
     */
    public function show(TugasWewenang $tugasWewenang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TugasWewenang  $tugasWewenang
     * @return \Illuminate\Http\Response
     */
    public function edit(TugasWewenang $tugasWewenang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TugasWewenang  $tugasWewenang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TugasWewenang $tugasWewenang)
    {
        $validateTugasWewenang = $request->validate([
            'isi_tugas_wewenang' => 'required',
            'jenis' => 'required',
        ]);

        TugasWewenang::where('id', $tugasWewenang->id)
            ->update($validateTugasWewenang);

        return redirect('/tugas-wewenang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TugasWewenang  $tugasWewenang
     * @return \Illuminate\Http\Response
     */
    public function destroy(TugasWewenang $tugasWewenang)
    {
        TugasWewenang::destroy('id', $tugasWewenang->id);

        return redirect('/tugas-wewenang');
    }

    public function getApiTugasWewenang()
    {
        return TugasWewenang::all();
    }
}
