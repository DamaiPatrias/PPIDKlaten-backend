<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/profil/struktur/struktur', [
            'title' => 'Struktur',
            'active' => 'struktur',
            'data_struktur' => Struktur::latest()->filter(request(['struktur_search']))->paginate(50)
        ]);
        // return Struktur::all();
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
        $validateStruktur = $request->validate([
            'pemangku_jabatan' => 'required',
            'jabatan' => 'required',
        ]);

        Struktur::create($validateStruktur);

        return redirect('/struktur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function show(Struktur $struktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Struktur $struktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Struktur $struktur)
    {
        $validateStruktur = $request->validate([
            'pemangku_jabatan' => 'required',
            'jabatan' => 'required',
        ]);

        Struktur::where('id', $struktur->id)
            ->update($validateStruktur);

        return redirect('/struktur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Struktur $struktur)
    {
        Struktur::destroy($struktur->id);

        return redirect('/struktur');
    }

    public function getApiStruktur()
    {
        return Struktur::all();
    }
}
