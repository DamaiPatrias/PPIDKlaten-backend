<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermohonanInformasi;
use Illuminate\Support\Facades\Validator;

class PostPermohonanInformasiController extends Controller
{
    public function postPermohonan(Request $request)
    {
        $validatorPermohonan = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'pekerjaan' => 'required',
            'alamat_lengkap' => 'required',
            'nik' => 'required',
            'file_ktp' => 'required|image|mimes:jpg,png|file|max:2048',
            // 'link_ktp' => 'required',
            'opd_tujuan' => 'required',
            'rincian_informasi' => 'required',
            'tujuan_informasi' => 'required',
            'mendapatkan_informasi' => 'required',
            'memperoleh_informasi' => 'required',
        ]);

        $hari = date('Y-m-d');
        $namaDirektori = 'ktp';
        $namaFile = $hari . '_' . $request->nik . '.' . $request->file('file_ktp')->getClientOriginalExtension();

        $link_ktp = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

        $validatePermohonan['file_ktp'] = $request->file('file_ktp')->storeAs($namaDirektori, $namaFile);

        if ($validatorPermohonan->fails()) {
            return response()->json($validatorPermohonan->errors(), 400);
        }

        $data = PermohonanInformasi::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'pekerjaan' => $request->pekerjaan,
            'alamat_lengkap' => $request->alamat_lengkap,
            'nik' => $request->nik,
            'file_ktp' => 'image|mimes:jpg,png|file|max:3092',
            'link_ktp' => $link_ktp,
            // 'link_ktp' => 'google.com',
            'opd_tujuan' => $request->opd_tujuan,
            'rincian_informasi' => $request->rincian_informasi,
            'tujuan_informasi' => $request->tujuan_informasi,
            'mendapatkan_informasi' => $request->mendapatkan_informasi,
            'memperoleh_informasi' => $request->memperoleh_informasi,
        ]);

        if ($data) {

            return response()->json([
                'success' => true,
                'message' => 'Post Created',
                'data'    => $data
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Post Failed to Save',
        ], 409);
    }
}
