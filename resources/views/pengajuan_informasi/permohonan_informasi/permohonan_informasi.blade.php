@extends('main')

@section('main-content')
<div class="card">
  <div class="card-body" style="border-bottom: 1px solid #f4f4f4;">
    <div class="mb-3">
      <form action="/permohonan-informasi" method="get">
        <div class="d-flex justify-content-between">
          <div style="width: 30%;">
            <div class="input-group">
              <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              <input type="text" class="form-control" placeholder="Pencarian" name="permohonan_informasi_search" value="{{ request('permohonan_informasi_search') }}">
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="table-responsive">
      <div class="input-group">
      <table class="table table-bordered table-striped m-0">
        <thead>
          <tr>
            <th scope="col" class="text-dark font-weight-bold p-2 text-center">No.</th>
            <th scope="col" class="text-dark font-weight-bold p-2">Nama Lengkap</th>
            <th scope="col" class="text-dark font-weight-bold p-2">Email</th>
            <th scope="col" class="text-dark font-weight-bold p-2">OPD Tujuan</th>
            @auth
              <th scope="col" class="text-dark font-weight-bold p-2">NIK</th>
              <th scope="col" class="text-dark font-weight-bold p-2 text-center">Aksi</th>
            @endauth
          </tr>
        </thead>
        <tbody>
          @foreach ($data_permohonan_informasi as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->nama_lengkap }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->opd_tujuan }}</td>
              @auth
                <td>{{ $item->nik }}</td>
                <td>
                  <a href="/permohonan-informasi/{{ $item->id }}" target="blank" class="badge badge-info rounded text-white border-0"><i class="fas fa-eye" style="margin-left: 1.5px; padding: 0 3px"></i></a>
                </td>
              @endauth
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer">
    <div class="d-flex justify-content-end">
      {{ $data_permohonan_informasi->links() }}
    </div>
  </div>
</div>


@push('css')
  <style>
    .form-container {
      display: none;
      justify-content: center;
      align-items: center;
      position: fixed;
      z-index: 5;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background-color: rgba(0, 0, 0, 0.1)
    }

    .form-content {
      width: 350px;
      padding: 30px 20px;
      background-color: white;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      border-radius: 5px
    }

    .form-control {
      border-radius: 3px !important;
    }

    .m-custom {
      margin-top: -25px;
      margin-right: -5px; 
    }

    .btn-custom {
      padding: 0px;
      background-color: transparent;
      border: none;
      color: rgb(255, 0, 0);
    }

    .btn-custom:focus {
      outline: 0;
    }

    .form-custom {
      font-size: 14px !important;
      height: 42px !important;
    }

    .page-item.disabled .page-link {
      color: #d21d21 !important;
    }

    .page-item.active .page-link {
      background-color: #d21d21 !important;
      border: 0;
    }

    .page-item .page-link {
      color: #d21d21;  
    }

    .page-item .page-link:hover {
      background-color: #d21d21 !important;
      color: white;  
    }
  </style>
@endpush

@endsection