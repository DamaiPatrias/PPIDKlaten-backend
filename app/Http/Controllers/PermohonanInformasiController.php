<?php

namespace App\Http\Controllers;

use App\Models\PermohonanInformasi;
use Illuminate\Http\Request;

class PermohonanInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/pengajuan_informasi/permohonan_informasi/permohonan_informasi', [
            'title' => 'Permohonan Informasi',
            'active' => 'permohonan_informasi',
            'data_permohonan_informasi' => PermohonanInformasi::orderBy('id')->filter(request(['permohonan_informasi_search']))->paginate(25),
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
        // $validatePermohonan = $request->validate([
        //     'nama_lengkap' => 'required',
        //     'email' => 'required',
        //     'no_telp' => 'required',
        //     'pekerjaan' => 'required',
        //     'alamat_lengkap' => 'required',
        //     'nik' => 'required',
        //     // 'file_ktp' => 'image|mimes:jpg,png|file|max:2048',
        //     'link_ktp' => '',
        //     'opd_tujuan' => 'required',
        //     'rincian_informasi' => 'required',
        //     'tujuan_informasi' => 'required',
        //     'mendapatkan_informasi' => 'required',
        //     'menperoleh_informasi' => 'required',
        // ]);

        // try {
        //     $hari = date('Y-m-d');
        //     $namaDirektori = 'ktp';
        //     $namaFile = $hari . '_' . $request->nik . '.' . $request->file('file_ktp')->getClientOriginalExtension();

        //     $validatePermohonan['link_ktp'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

        //     $validatePermohonan['file_ktp'] = $request->file('file_ktp')->storeAs($namaDirektori, $namaFile);

        //     $response = PermohonanInformasi::create([
        //         'nama_lengkap' => $request->nama_lengkap,
        //         'email' => $request->email,
        //         'no_telp' => $request->no_telp,
        //         'pekerjaan' => $request->pekerjaan,
        //         'alamat_lengkap' => $request->alamat_lengkap,
        //         'nik' => $request->nik,
        //         // 'file_ktp' => 'image|mimes:jpg,png|file|max:2048',
        //         'link_ktp' => $request->link_ktp,
        //         'opd_tujuan' => $request->opd_tujuan,
        //         'rincian_informasi' => $request->rincian_informasi,
        //         'tujuan_informasi' => $request->tujuan_informasi,
        //         'mendapatkan_informasi' => $request->mendapatkan_informasi,
        //         'memperoleh_informasi' => $request->menperoleh_informasi,
        //     ]);
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'success',
        //         'data' => $response
        //     ]);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'success' => 'Err',
        //         'errors' => $e->getMessage(),
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermohonanInformasi  $permohonanInformasi
     * @return \Illuminate\Http\Response
     */
    public function show(PermohonanInformasi $permohonanInformasi)
    {
        return view('/pengajuan_informasi/permohonan_informasi/show', [
            'title' => 'Detail Permohonan Informasi',
            'active' => 'permohonan_informasi',
            'data_permohonan_informasi' => $permohonanInformasi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermohonanInformasi  $permohonanInformasi
     * @return \Illuminate\Http\Response
     */
    public function edit(PermohonanInformasi $permohonanInformasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermohonanInformasi  $permohonanInformasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermohonanInformasi $permohonanInformasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermohonanInformasi  $permohonanInformasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermohonanInformasi $permohonanInformasi)
    {
        //
    }
}
