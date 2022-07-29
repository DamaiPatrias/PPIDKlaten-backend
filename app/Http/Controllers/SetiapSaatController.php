<?php

namespace App\Http\Controllers;

use App\Models\SetiapSaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SetiapSaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('informasi_publik/setiap_saat/setiap_saat', [
            'title' => 'Informasi Setiap Saat',
            'active' => 'setiap_saat',
            'data_setiap_saat' => SetiapSaat::orderBy('id')->filter(request(['setiap_saat_search']))->paginate(50)
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
        $validateSetiapSaat = $request->validate([
            'nama_dokumen_setiap_saat' => ['required'],
            // 'link_dokumen_setiap_saat' => ['required'],
            'file_dokumen_setiap_saat' => 'required|file|mimes:pdf|max:5120',
        ]);

        $hari = date('Y-m-d');
        $namaFile = $hari . '_' . $request->nama_dokumen_setiap_saat . '.' . $request->file('file_dokumen_setiap_saat')->getClientOriginalExtension();
        $namaDirektori = 'setiap_saat';

        $validateSetiapSaat['link_dokumen_setiap_saat'] = url('/')  . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

        $validateSetiapSaat['nama_file_setiap_saat'] = $namaFile;

        $validateSetiapSaat['file_dokumen_setiap_saat'] = $request->file('file_dokumen_setiap_saat')->storeAs($namaDirektori, $namaFile);

        SetiapSaat::create($validateSetiapSaat);

        return redirect('/setiap-saat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SetiapSaat  $setiapSaat
     * @return \Illuminate\Http\Response
     */
    public function show(SetiapSaat $setiapSaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SetiapSaat  $setiapSaat
     * @return \Illuminate\Http\Response
     */
    public function edit(SetiapSaat $setiapSaat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SetiapSaat  $setiapSaat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SetiapSaat $setiapSaat)
    {
        $validateSetiapSaat = $request->validate([
            'nama_dokumen_setiap_saat' => 'required',
            'file_dokumen_setiap_saat' => '|file|mimes:pdf|max:5120',
        ]);

        $hari = date('Y-m-d');
        $namaDirektori = 'setiap_saat';

        if ($request->file('file_dokumen_setiap_saat')) {
            Storage::delete($namaDirektori . '/' . $request->nama_dokumen_setiap_saat_lama);

            $namaFile = $hari . '_' . $request->nama_dokumen_setiap_saat . '.' . $request->file('file_dokumen_setiap_saat')->getClientOriginalExtension();

            $validateSetiapSaat['link_dokumen_setiap_saat'] = url('/')  . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

            $validateSetiapSaat['nama_file_setiap_saat'] = $namaFile;

            $validateSetiapSaat['file_dokumen_setiap_saat'] = $request->file('file_dokumen_setiap_saat')->storeAs($namaDirektori, $namaFile);
        } else {
            $namaFileBaru = $hari . '_' . $request->nama_dokumen_setiap_saat . '.pdf';

            $validateSetiapSaat['nama_file_setiap_saat'] = $namaFileBaru;

            $validateSetiapSaat['link_dokumen_setiap_saat'] = url('/')  . '/storage' . '/' . $namaDirektori . '/' . $namaFileBaru;

            Storage::move('setiap_saat/' . $request->nama_dokumen_setiap_saat_lama, 'setiap_saat/' . $namaFileBaru);
        }

        SetiapSaat::where('id', $setiapSaat->id)
            ->update([
                'nama_dokumen_setiap_saat' => $request->nama_dokumen_setiap_saat,
                'link_dokumen_setiap_saat' => $validateSetiapSaat['link_dokumen_setiap_saat'],
                'nama_file_setiap_saat' => $validateSetiapSaat['nama_file_setiap_saat'],
            ]);

        return redirect('/setiap-saat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SetiapSaat  $setiapSaat
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetiapSaat $setiapSaat)
    {
        $namaDirektori = 'setiap_saat';

        Storage::delete($namaDirektori . '/' . $setiapSaat->nama_file_setiap_saat);
        SetiapSaat::destroy($setiapSaat->id);

        return redirect('/setiap-saat');
    }

    public function getApiSetiapSaat()
    {
        return SetiapSaat::all();
    }
}
