<?php

namespace App\Http\Controllers;

use App\Models\TeksBeranda;
use Illuminate\Http\Request;

class TeksBerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/beranda/teks_beranda/teks_beranda', [
            'title' => 'Teks Beranda',
            'active' => 'teks_beranda',
            'data_teks_beranda' => TeksBeranda::get()->collect(),
        ]);
        // return TeksBeranda::get()->toArray();
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
     * @param  \App\Models\TeksBeranda  $teksBeranda
     * @return \Illuminate\Http\Response
     */
    public function show(TeksBeranda $teksBeranda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeksBeranda  $teksBeranda
     * @return \Illuminate\Http\Response
     */
    public function edit(TeksBeranda $teksBeranda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeksBeranda  $teksBeranda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeksBeranda $teksBeranda)
    {
        $validateTeksBeranda = $request->validate([
            'judul_beranda' => 'required',
            'teks_beranda' => 'required'
        ]);

        TeksBeranda::where('id', $teksBeranda->id)
            ->update($validateTeksBeranda);

        return redirect('/teks-beranda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeksBeranda  $teksBeranda
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeksBeranda $teksBeranda)
    {
        //
    }

    public function getApiTeksBeranda()
    {
        return TeksBeranda::all();
    }
}
