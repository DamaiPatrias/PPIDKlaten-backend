<?php

namespace App\Http\Controllers;

use App\Models\Maklumat;
use Illuminate\Http\Request;

class MaklumatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/profil/maklumat/maklumat', [
            'title' => 'Maklumat',
            'active' => 'maklumat',
            'data_maklumat' => Maklumat::orderBy('id')->filter(request(['maklumat_search']))->paginate(50),
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
        $validateMaklumat = $request->validate([
            'maklumat' => 'required',
        ]);

        Maklumat::create($validateMaklumat);

        return redirect('/maklumat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maklumat  $maklumat
     * @return \Illuminate\Http\Response
     */
    public function show(Maklumat $maklumat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maklumat  $maklumat
     * @return \Illuminate\Http\Response
     */
    public function edit(Maklumat $maklumat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maklumat  $maklumat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maklumat $maklumat)
    {
        $validateMaklumat = $request->validate([
            'maklumat' => 'required',
        ]);

        Maklumat::where('id', $maklumat->id)
            ->update($validateMaklumat);

        return redirect('/maklumat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maklumat  $maklumat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maklumat $maklumat)
    {
        Maklumat::destroy($maklumat->id);

        return redirect('/maklumat');
    }

    public function getApiMaklumat()
    {
        return Maklumat::all();
    }
}
