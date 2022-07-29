<?php

namespace App\Http\Controllers;

use App\Models\SertaMerta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SertaMertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('informasi_publik/serta_merta/serta_merta', [
            'title' => 'Informasi Serta Merta',
            'active' => 'serta_merta',
            'data_serta_merta' => SertaMerta::orderBy('id')->filter(request(['serta_merta_search']))->paginate(50),
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
        $validateSertaMerta = $request->validate([
            'nama_dokumen_serta_merta' => ['required'],
            // 'link_dokumen_serta_merta' => ['required'],
            'file_dokumen_serta_merta' => 'required|file|mimes:pdf|max:5120',
        ]);

        $hari = date('Y-m-d');
        $namaFile = $hari . '_' . $request->nama_dokumen_serta_merta . '.' . $request->file('file_dokumen_serta_merta')->getClientOriginalExtension();
        $namaDirektori = 'serta_merta';

        $validateSertaMerta['link_dokumen_serta_merta'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

        $validateSertaMerta['nama_file_serta_merta'] = $namaFile;

        $validateSertaMerta['file_dokumen_serta_merta'] = $request->file('file_dokumen_serta_merta')->storeAs($namaDirektori, $namaFile);

        SertaMerta::create($validateSertaMerta);

        return redirect('/serta-merta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SertaMerta  $sertaMerta
     * @return \Illuminate\Http\Response
     */
    public function show(SertaMerta $sertaMerta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SertaMerta  $sertaMerta
     * @return \Illuminate\Http\Response
     */
    public function edit(SertaMerta $sertaMerta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SertaMerta  $sertaMerta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SertaMerta $sertaMerta)
    {
        $validateSertaMerta = $request->validate([
            'nama_dokumen_serta_merta' => 'required',
            'link_dokumen_serta_merta' => '',
            "nama_file_serta_merta" => '',
            'file_dokumen_serta_merta' => 'file|mimes:pdf|max:5120',
        ]);

        $hari =  date('Y-m-d');
        $namaDirektori = 'serta_merta';
        $namaFileLama = $request->nama_file_serta_merta_lama;

        if ($request->file('file_dokumen_serta_merta')) {
            $namaFile = $hari . '_' . $request->nama_dokumen_serta_merta . '.' . $request->file('file_dokumen_serta_merta')->getClientOriginalExtension();

            $validateSertaMerta['link_dokumen_serta_merta'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

            $validateSertaMerta['nama_file_serta_merta'] = $namaFile;

            $validateSertaMerta['file_dokumen_serta_merta'] = $request->file('file_dokumen_serta_merta')->storeAs($namaDirektori, $namaFile);

            Storage::delete($namaDirektori . '/' . $request->nama_file_serta_merta_lama);
        } else {
            $namaFileBaru = $hari . '_' . $request->nama_dokumen_serta_merta . '.pdf';

            $validateSertaMerta['nama_file_serta_merta'] = $namaFileBaru;

            $validateSertaMerta['link_dokumen_serta_merta'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFileBaru;

            Storage::move('serta_merta/' . $namaFileLama, 'serta_merta/' . $namaFileBaru);
        }

        SertaMerta::where('id', $request->id)
            ->update([
                'nama_dokumen_serta_merta' => $request->nama_dokumen_serta_merta,
                'link_dokumen_serta_merta' => $validateSertaMerta['link_dokumen_serta_merta'],
                'nama_file_serta_merta' => $validateSertaMerta['nama_file_serta_merta'],
            ]);

        return redirect('/serta-merta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SertaMerta  $sertaMerta
     * @return \Illuminate\Http\Response
     */
    public function destroy(SertaMerta $sertaMerta, Request $request)
    {
        Storage::delete('serta_merta/' . $request->nama_file_serta_merta);
        SertaMerta::destroy($request->id);

        // Storage::delete('serta_merta/' . $sertaMerta->nama_file_serta_merta);
        // SertaMerta::destroy($sertaMerta->id);

        return redirect('/serta-merta');
    }

    public function getApiSertaMerta()
    {
        return SertaMerta::all();
    }
}
