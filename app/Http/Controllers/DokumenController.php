<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dokumen/dokumen', [
            'title' => 'Dokumen',
            'active' => 'dokumen',
            'data_dokumen' => Dokumen::orderBy('id')->filter(request(['dokumen_search']))->paginate(50)
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
        $validateDokumen = $request->validate([
            'nama_dokumen' => 'required',
            // 'link_dokumen' => ['required'],
            'file_dokumen' => 'required|file|mimes:pdf|max:5120',
        ]);

        $hari = date('Y-m-d');
        $namaFile = $hari . '_' . $request->nama_dokumen . '.' . $request->file('file_dokumen')->getClientOriginalExtension();
        $namaDirektori = 'dokumen';

        $validateDokumen['link_dokumen'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

        $validateDokumen['nama_file_dokumen'] = $namaFile;

        $validateDokumen['file_dokumen'] = $request->file('file_dokumen')->storeAs($namaDirektori, $namaFile);

        Dokumen::create($validateDokumen);

        return redirect('/dokumen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function show(Dokumen $dokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokumen $dokumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokumen $dokumen)
    {
        $validateDokumen = $request->validate([
            'nama_dokumen' => 'required',
            'link_dokumen' => '',
            'nama_file_dokumen' => '',
            'file_dokumen' => 'file|max:5120|mimes:pdf',
        ]);

        $hari =  date('Y-m-d');
        $namaDirektori = 'dokumen';
        $namaFileLama = $request->nama_file_dokumen_lama;

        if ($request->file('file_dokumen')) {
            Storage::delete($namaDirektori . '/' . $request->nama_file_dokumen_lama);

            $namaFile = $hari . '_' . $request->nama_dokumen . '.' . $request->file('file_dokumen')->getClientOriginalExtension();

            $validateDokumen['link_dokumen'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

            $validateDokumen['nama_file_dokumen'] = $namaFile;

            $validateDokumen['file_dokumen'] = $request->file('file_dokumen')->storeAs($namaDirektori, $namaFile);
        } else {
            $namaFileBaru = $hari . '_' . $request->nama_dokumen . '.pdf';

            $validateDokumen['nama_file_dokumen'] = $namaFileBaru;

            $validateDokumen['link_dokumen'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFileBaru;

            Storage::move('dokumen/' . $namaFileLama, 'dokumen/' . $namaFileBaru);
        }

        // return $validateDokumen;

        Dokumen::where('id', $request->id)
            ->update([
                'nama_dokumen' => $request->nama_dokumen,
                'link_dokumen' => $validateDokumen['link_dokumen'],
                'nama_file_dokumen' => $validateDokumen['nama_file_dokumen']
            ]);

        return redirect('/dokumen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokumen $dokumen, Request $request)
    {
        // $namaDirektori = 'dokumen';

        // Storage::delete('dokumen/' . $dokumen->nama_file_dokumen);
        // Dokumen::destroy($dokumen->id);

        Storage::delete('dokumen/' . $request->nama_file_dokumen);
        Dokumen::destroy($request->id);

        return redirect('/dokumen');
    }

    public function getApiDokumen()
    {
        return Dokumen::all();
    }
}
