<?php

namespace App\Http\Controllers;

use App\Models\KeberatanInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostKeberatanInformasiController extends Controller
{
    public function postKeberatan(Request $request)
    {
        $validatorKeberatan = Validator::make($request->all(), [
            'nomer_registrasi_permohonan_informasi' => 'required',
            'tujuan_penggunaan_informasi' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'pekerjaan' => 'required',
            'alamat_lengkap' => 'required',
            'nama_lengkap_kuasa' => '',
            'email_kuasa' => '',
            'no_telp_kuasa' => '',
            'pekerjaan_kuasa' => '',
            'alamat_lengkap_kuasa' => '',
            // 'file_surat_kuasa' => 'image|mimes:jpg,png|file|max:2048',
            'file_surat_kuasa' => 'mimes:pdf,docx|file|max:5120',
            // 'link_surat_kuasa' => '',
            'alasan_keberatan' => 'required',
        ]);

        if ($request->file('file_surat_kuasa')) {
            $hari = date('Y-m-d');
            $namaDirektori = 'surat_kuasa';
            $namaFile = $hari . '_' . $request->nama_lengkap . '.' . $request->file('file_surat_kuasa')->getClientOriginalExtension();

            $link_file_kuasa = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

            $validateKeberatan['file_surat_kuasa'] = $request->file('file_surat_kuasa')->storeAs('surat_kuasa', $namaFile);
            // $link_file_kuasa = url('/') . '/storage' . '/' . 'harusnya bisa';
        } else {
            $link_file_kuasa = null;
        }

        if ($validatorKeberatan->fails()) {
            return response()->json($validatorKeberatan->errors(), 400);
        }

        $data = KeberatanInformasi::create([
            'nomer_registrasi_permohonan_informasi' => $request->nomer_registrasi_permohonan_informasi,
            'tujuan_penggunaan_informasi' => $request->tujuan_penggunaan_informasi,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'pekerjaan' => $request->pekerjaan,
            'alamat_lengkap' => $request->alamat_lengkap,
            'nama_lengkap_kuasa' => $request->nama_lengkap_kuasa,
            'email_kuasa' => $request->email_kuasa,
            'no_telp_kuasa' => $request->no_telp_kuasa,
            'pekerjaan_kuasa' => $request->pekerjaan_kuasa,
            'alamat_lengkap_kuasa' => $request->alamat_lengkap_kuasa,
            'link_surat_kuasa' => $link_file_kuasa,
            'alasan_keberatan' => $request->alasan_keberatan,
        ]);

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Post Created',
                'data' => $data
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => "Post Failed to Save"
        ], 409);
    }
}
