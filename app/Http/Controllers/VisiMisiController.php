<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/profil/visi_misi/visi_misi', [
            'title' => 'Visi Misi',
            'active' => 'visi_misi',
            'data_visi_misi' => VisiMisi::orderBy('id')->filter(request(['visi_misi_search']))->paginate(50),
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
        $validateVisiMisi = $request->validate([
            'isi_visi_misi' => 'required',
            'jenis' => 'required',
        ]);

        VisiMisi::create($validateVisiMisi);

        return redirect('/visi-misi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function show(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function edit(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisiMisi $visiMisi)
    {
        $validateVisiMisi = $request->validate([
            'isi_visi_misi' => 'required',
            'jenis' => 'required',
        ]);

        VisiMisi::where('id', $visiMisi->id)
            ->update($validateVisiMisi);

        return redirect('/visi-misi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisiMisi  $visiMisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisiMisi $visiMisi)
    {
        VisiMisi::destroy('id', $visiMisi->id);

        return redirect('/visi-misi');
    }

    public function getApiVisiMisi()
    {
        return VisiMisi::all();
    }
}
