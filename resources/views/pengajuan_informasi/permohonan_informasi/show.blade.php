@extends('main')

@section('main-content')
<div class="card">
  <div class="card-body">
    <form>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label class="px-1">Nama Lengkap</label>
            <input type="text" class="form-control" value="{{ $data_permohonan_informasi->nama_lengkap }}">
          </div>
          <div class="form-group">
            <label class="px-1">Email</label>
            <input type="text" class="form-control" value="{{ $data_permohonan_informasi->email }}">
          </div>
          <div class="form-group">
            <label class="px-1">No. Telp</label>
            <input type="text" class="form-control" value="{{ $data_permohonan_informasi->no_telp }}">
          </div>
          <div class="form-group">
            <label class="px-1">Pekerjaan</label>
            <input type="text" class="form-control" value="{{ $data_permohonan_informasi->pekerjaan }}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label class="px-1">Alamat Lengkap</label>
            <input type="text" class="form-control" value="{{ $data_permohonan_informasi->alamat_lengkap }}">
          </div>
          <div class="form-group">
            <label class="px-1">NIK</label>
            <input type="text" class="form-control" value="{{ $data_permohonan_informasi->nik }}">
          </div>
          <div class="form-group">
            <label>Foto KTP</label>
            <br>
            <img src="{{ $data_permohonan_informasi->link_ktp }}" alt="" style="height: 135px; width: 300px;">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="px-1">OPD Tujuan</label>
        <input type="text" class="form-control" value="{{ $data_permohonan_informasi->opd_tujuan }}">
      </div>
      <div class="form-group">
        <label class="px-1">Rincian Informasi yang Dibutuhkan</label>
        <input type="text" class="form-control" value="{{ $data_permohonan_informasi->rincian_informasi }}">
      </div>
      <div class="form-group">
        <label class="px-1">Tujuan Penggunaan Informasi</label>
        <input type="text" class="form-control" value="{{ $data_permohonan_informasi->tujuan_informasi }}">
      </div>
      <div class="form-group">
        <label class="px-1">Cara Mendapatkan Informasi</label>
        <input type="text" class="form-control" value="{{ $data_permohonan_informasi->mendapatkan_informasi }}">
      </div>
      <div class="form-group">
        <label class="px-1">Cara Memperoleh Informasi</label>
        <input type="text" class="form-control" value="{{ $data_permohonan_informasi->memperoleh_informasi }}">
      </div>
    </form>
  </div>
</div>
@endsection