<?php

namespace App\Http\Controllers;

use App\Models\Berkala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerkalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('informasi_publik/berkala/berkala', [
            'title' => 'Informasi Berkala',
            'active' => 'berkala',
            'data_berkala' => Berkala::orderBy('id')->filter(request(['berkala_search']))->paginate(50)
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
        $validateBerkala = $request->validate([
            'nama_dokumen_berkala' => ['required'],
            // 'link_dokumen_berkala' => ['required'],
            'file_dokumen_berkala' => 'required|file|mimes:pdf|max:5120',
        ]);

        $hari =  date('Y-m-d');
        $namaFile = $hari . '_' . $request->nama_dokumen_berkala . '.' . $request->file('file_dokumen_berkala')->getClientOriginalExtension();
        $namaDirektori = 'berkala';

        $validateBerkala['nama_file_berkala'] = $namaFile;

        $validateBerkala['link_dokumen_berkala'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

        $validateBerkala['file_dokumen_berkala'] = $request->file('file_dokumen_berkala')->storeAs($namaDirektori, $namaFile);

        Berkala::create($validateBerkala);

        return redirect('/berkala');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berkala  $berkala
     * @return \Illuminate\Http\Response
     */
    public function show(Berkala $berkala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berkala  $berkala
     * @return \Illuminate\Http\Response
     */
    public function edit(Berkala $berkala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berkala  $berkala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berkala $berkala)
    {
        $validateBerkala = $request->validate([
            'nama_dokumen_berkala' => 'required',
            'link_dokumen_berkala' => '',
            'nama_file_berkala' => '',
            'file_dokumen_berkala' => 'file|max:5120|mimes:pdf',
        ]);

        $hari =  date('Y-m-d');
        $namaDirektori = 'berkala';
        $namaFileLama = $request->nama_file_berkala_lama;

        if ($request->file('file_dokumen_berkala')) {
            Storage::delete($namaDirektori . '/' . $request->nama_file_berkala_lama);

            $namaFile = $hari . '_' . $request->nama_dokumen_berkala . '.' . $request->file('file_dokumen_berkala')->getClientOriginalExtension();

            $validateBerkala['nama_file_berkala'] = $namaFile;

            $validateBerkala['link_dokumen_berkala'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

            $validateBerkala['file_dokumen_berkala'] = $request->file('file_dokumen_berkala')->storeAs($namaDirektori, $namaFile);
        } else {
            $namaFileBaru = $hari . '_' . $request->nama_dokumen_berkala . '.pdf';

            $validateBerkala['nama_file_berkala'] = $namaFileBaru;

            $validateBerkala['link_dokumen_berkala'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFileBaru;

            Storage::move('berkala/' . $namaFileLama, 'berkala/' . $namaFileBaru);
        }

        // return $validateBerkala;

        Berkala::where('id', $berkala->id)
            ->update([
                'nama_dokumen_berkala' => $request->nama_dokumen_berkala,
                'link_dokumen_berkala' => $validateBerkala['link_dokumen_berkala'],
                'nama_file_berkala' => $validateBerkala['nama_file_berkala']
            ]);

        return redirect('/berkala');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berkala  $berkala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berkala $berkala)
    {
        $namaDirektori = 'berkala';

        Storage::delete($namaDirektori . '/' . $berkala->nama_file_berkala);
        Berkala::destroy($berkala->id);

        return redirect('/berkala');
    }

    public function getApiBerkala()
    {
        return Berkala::all();
    }
}
