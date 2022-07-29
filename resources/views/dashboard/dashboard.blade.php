@extends('main')

@section('main-content')
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <a href="">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-sync"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Informasi Berkala</h4>
          </div>
          <div class="card-body">
            {{ $data_berkala }}
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <a href="">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-stopwatch"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Informasi Serta Merta</h4>
          </div>
          <div class="card-body">
            {{ $data_serta_merta }}
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <a href="">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fas fa-clock"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Informasi Setiap Saat</h4>
          </div>
          <div class="card-body">
            {{ $data_setiap_saat }}
          </div>
        </div>
      </div>
    </a>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h3 class="text-dark m-0 p-0">Pengajuan Permohonan Informasi</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped m-0">
      <thead>
        <tr>
          <th scope="col" class="text-dark font-weight-bold p-2 text-center">No.</th>
          <th scope="col" class="text-dark font-weight-bold p-2">Nama Lengkap</th>
          <th scope="col" class="text-dark font-weight-bold p-2">Email</th>
          <th scope="col" class="text-dark font-weight-bold p-2">OPD Tujuan</th>
          <th scope="col" class="text-dark font-weight-bold p-2">NIK</th>
          <th scope="col" class="text-dark font-weight-bold p-2 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data_permohonan_informasi as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama_lengkap }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->opd_tujuan }}</td>
            <td>{{ $item->nik }}</td>
            <td>
              <a href="/permohonan-informasi/{{ $item->id }}" target="blank" class="badge badge-info rounded text-white border-0"><i class="fas fa-eye" style="margin-left: 1.5px; padding: 0 3px"></i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h3 class="text-dark m-0 p-0">Pengajuan Keberatan Informasi</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped m-0">
      <thead>
        <tr>
          <th scope="col" class="text-dark font-weight-bold">No.</th>
          <th scope="col" class="text-dark font-weight-bold">Nomer Registrasi</th>
          <th scope="col" class="text-dark font-weight-bold">Nama Lengkap</th>
          <th scope="col" class="text-dark font-weight-bold">Nama Lengkap Kuasa</th>
          <th scope="col" class="text-dark font-weight-bold">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data_keberatan_informasi as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nomer_registrasi_permohonan_informasi }}</td>
            <td>{{ $item->nama_lengkap }}</td>
            <td>{{ $item->nama_lengkap_kuasa }}</td>
            <td>
              <a href="/keberatan-informasi/{{ $item->id }}" target="blank" class="badge badge-info rounded text-white border-0"><i class="fas fa-eye" style="margin-left: 1.5px; padding: 0 3px"></i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection