@extends('main')

@section('main-content')
<div class="card">
  <div class="card-header">
    <button class="btn btn-success" onclick="formTambah()" style="border-radius: 3px !important;">Tambah Data</button>
    <div class="form-container" id="fromtambah" 
      @error('nama_gambar')
          style="display: flex !important"
      @enderror 
      @error('gambar')
          style="display: flex !important"
      @enderror>
      <div class="form-content">
        <div class="text-right m-custom">
          <button class="btn-custom text-right" onclick="formTambah()" style="font-size: 23px; font-weight: 700;">×</button>
        </div>
        <form action="/carousel" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
              <label class="pl-2 m-0 text-dark">Nama Gambar</label>
              <input type="text" name="nama_gambar" class="form-control form-custom @error('nama_gambar') is-invalid @enderror" placeholder="nama gambar">
              @error('nama_gambar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="pl-2 m-0 text-dark">Gambar</label>
              <input type="file" name="gambar" class="form-control-file form-custom @error('gambar') is-invalid @enderror">
              @error('gambar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-success" style="border-radius: 3px !important;">Tambah</button>
        </form>
      </div>
    </div>
  </div>
  <div class="card-body" style="border-bottom: 1px solid #f4f4f4;">
    <div class="mb-3">
      <form action="/berkala" method="get">
        <div class="d-flex justify-content-between">
          <div style="width: 30%;">
            <div class="input-group">
              <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              <input type="text" class="form-control" placeholder="Pencarian" name="berkala_search" value="{{ request('berkala_search') }}">
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
            <th scope="col" class="text-dark font-weight-bold">No.</th>
            <th scope="col" class="text-dark font-weight-bold">Nama Gambar</th>
            <th scope="col" class="text-dark font-weight-bold">Link Gambar</th>
            <th scope="col" class="text-dark font-weight-bold" style="width: 20% !important;">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($data_carousel as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama_gambar }}</td>
            <td>{{ $item->link_gambar }}</td>
            <td class="text-center">
              <a href="{{ $item->link_gambar }}" target="blank" class="badge badge-info rounded text-white border-0"><i class="fas fa-eye" style="margin-left: 1.5px; padding: 0 3px"></i></a>
              <button class="badge badge-warning rounded text-white border-0" onclick="formUbah{{ $item->id }}()"><i class="fas fa-edit" style="margin-left: 3px; padding: 0 3px"></i></button>
              <div class="form-container" id="fromubah{{ $item->id }}" 
                @error('nama_gambar')
                    style="display: flex !important"
                @enderror 
                @error('gambar')
                    style="display: flex !important"
                @enderror>
                <div class="form-content">
                  <div class="text-right m-custom">
                    <button class="btn-custom text-right" onclick="formUbah{{ $item->id }}()" style="font-size: 23px; font-weight: 700;">×</button>
                  </div>
                  <form action="/carousel/{{ $item->id }}" method="post" enctype="multipart/form-data" class="text-left">
                      @method('patch')
                      @csrf
                      <div class="form-group mb-4">
                        <label class="pl-2 m-0 text-dark">Nama Gambar</label>
                        <input type="text" name="nama_gambar" class="form-control form-custom @error('nama_gambar') is-invalid @enderror" placeholder="nama gambar">
                        @error('nama_gambar')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group mb-4">
                        <input type="hidden" name="nama_gambar_lama" class="form-control" value="{{ $item->nama_file_gambar }}">
                      </div>
                      <div class="form-group">
                        <label class="pl-2 m-0 text-dark">Gambar</label>
                        <input type="file" name="gambar" class="form-control-file form-custom @error('gambar') is-invalid @enderror">
                        @error('gambar')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-warning" style="border-radius: 3px !important;">Ubah</button>
                  </form>
                </div>
              </div>
              <form action="/carousel/{{ $item->id }}" method="post" enctype="multipart/form-data" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge badge-danger rounded text-white border-0" onclick="return confirm('Apakah anda mau menghapusnya ?')"><i class="fas fa-times" style="margin-left: 0; padding: 0 3px"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer">
    {{-- <div class="d-flex justify-content-end">
      
    </div> --}}
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

@push('js')
  <script>
    function formTambah() {
      var form = document.getElementById("fromtambah")
      if(form.style.display === "flex") {
        form.style.display = "none"
      } else {
        form.style.display = "flex"
      }
    }
  </script>

  @foreach ($data_carousel as $item)
  <script>
    function formUbah{{ $item->id }}() {
      var form = document.getElementById("fromubah{{ $item->id }}")
      if(form.style.display === "flex") {
        form.style.display = "none"
      } else {
        form.style.display = "flex"
      }
    }
  </script>
  @endforeach
@endpush
@endsection