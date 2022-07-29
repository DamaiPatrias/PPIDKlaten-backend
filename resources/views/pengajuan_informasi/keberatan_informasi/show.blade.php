@extends('main')

@section('main-content')
<div class="card">
  <div class="card-body">
    <form action="">
      <div class="form-group">
        <label class="px-1">Nomer Registrasi</label>
        <input type="text" class="form-control" value="{{ $data_keberatan_informasi->nomer_registrasi_permohonan_informasi }}"> 
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label class="px-1">Nama Lengkap</label>
            <input type="text" class="form-control" value="{{ $data_keberatan_informasi->nama_lengkap }}">
          </div>
          <div class="form-group">
            <label class="px-1">Email</label>
            <input type="text" class="form-control" value="{{ $data_keberatan_informasi->email }}">
          </div>
          <div class="form-group">
            <label class="px-1">No.Telp</label>
            <input type="text" class="form-control" value="{{ $data_keberatan_informasi->no_telp }}">
          </div>
          <div class="form-group">
            <label class="px-1">Pekerjaan</label>
            <input type="text" class="form-control" value="{{ $data_keberatan_informasi->pekerjaan }}">
          </div>
          <div class="form-group">
            <label class="px-1">Alamat</label>
            <input type="text" class="form-control" value="{{ $data_keberatan_informasi->alamat_lengkap}}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label class="px-1">Nama Lengkap Kuasa</label>
            <input type="text" class="form-control" value="{{ $data_keberatan_informasi->nama_lengkap_kuasa }}">
          </div>
          <div class="form-group">
            <label class="px-1">Email Kuasa</label>
            <input type="text" class="form-control" value="{{ $data_keberatan_informasi->email_kuasa }}">
          </div>
          <div class="form-group">
            <label class="px-1">No.Telp Kuasa</label>
            <input type="text" class="form-control" value="{{ $data_keberatan_informasi->no_telp_kuasa }}">
          </div>
          <div class="form-group">
            <label class="px-1">Pekerjaan Kuasa</label>
            <input type="text" class="form-control" value="{{ $data_keberatan_informasi->pekerjaan_kuasa }}">
          </div>
          <div class="form-group">
            <label class="px-1">Alamat Kuasa</label>
            <input type="text" class="form-control" value="{{ $data_keberatan_informasi->alamat_lengkap_kuasa }}">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="px-1">Surat Kuasa</label>
        <br>
        @if ($data_keberatan_informasi->link_surat_kuasa !== null)
          <div class="form-control">
            <a href="{{ $data_keberatan_informasi->link_surat_kuasa }}" target="blank">Lihat surat kuasa</a>
          </div>
        @else
          <div class="form-control">
            <span>Tidak Ada Surat Kuasa</span>
          </div>
        @endif
      </div>
      <div class="form-group">
        <label class="px-1">Tujuan Penggunaan Informasi</label>
        <input type="text" class="form-control" value="{{ $data_keberatan_informasi->tujuan_penggunaan_informasi }}"> 
      </div>
      <div class="form-group">
        <label class="px-1">Alasan Keberatan Informasi</label>
        <input type="text" class="form-control" value="{{ $data_keberatan_informasi->alasan_keberatan }}"> 
      </div>
    </form>
  </div>
</div>
@endsection