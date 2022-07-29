<?php

namespace App\Http\Controllers;

use App\Models\PpidPembantu;
use Illuminate\Http\Request;

class PpidPembantuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/ppid_pembantu/ppid_pembantu', [
            'title' => 'PPID Pembantu',
            'active' => 'ppid_pembantu',
            'data_ppid' => PpidPembantu::orderBy('id')->filter(request(['ppid_search']))->paginate(50)
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
        $validateppid = $request->validate([
            'nama_instansi' => 'required',
            'link_instansi' => 'required',
        ]);

        PpidPembantu::create($validateppid);

        return redirect('/ppid-pembantu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PpidPembantu  $ppidPembantu
     * @return \Illuminate\Http\Response
     */
    public function show(PpidPembantu $ppidPembantu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PpidPembantu  $ppidPembantu
     * @return \Illuminate\Http\Response
     */
    public function edit(PpidPembantu $ppidPembantu)
    {
        return view('ppid_pembantu.edit', [
            'data' => $ppidPembantu,
            'title' => 'PPID Pembantu',
            'active' => 'ppid_pembantu',
            'data_ppid' => PpidPembantu::orderBy('id')->filter(request(['ppid_search']))->paginate(7)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PpidPembantu  $ppidPembantu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PpidPembantu $ppidPembantu)
    {
        $validateppid = $request->validate([
            'nama_instansi' => 'required',
            'link_instansi' => 'required',
        ]);

        PpidPembantu::where('id', $ppidPembantu->id)
            ->update($validateppid);

        return redirect('/ppid-pembantu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PpidPembantu  $ppidPembantu
     * @return \Illuminate\Http\Response
     */
    public function destroy(PpidPembantu $ppidPembantu)
    {
        PpidPembantu::destroy($ppidPembantu->id);

        return redirect('/ppid-pembantu');
    }

    public function getApiPpidPembantu()
    {
        return PpidPembantu::all();
    }
}
