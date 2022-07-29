@extends('main')

@section('main-content')
<div class="card">
  <div class="card-header">
    <button class="btn btn-success" onclick="formTambah()" style="border-radius: 3px !important;">Tambah Data</button>
    <div class="form-container" id="formtambah" 
      @error('nama_dokumen')
          style="display: flex !important"
      @enderror 
      @error('file_dokumen')
          style="display: flex !important"
      @enderror>
      <div class="form-content">
        <div class="text-right m-custom">
          <button class="btn-custom text-right" onclick="formTambah()" style="font-size: 23px; font-weight: 700;">×</button>
        </div>
        <form action="/dokumen" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
              <label class="pl-2 m-0 text-dark">Nama Dokumen</label>
              <input type="text" name="nama_dokumen" class="form-control form-custom @error('nama_dokumen') is-invalid @enderror" placeholder="nama dokumen">
              @error('nama_dokumen')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="pl-2 m-0 text-dark">Upload File</label>
              <input type="file" name="file_dokumen" class="form-control-file form-custom @error('file_dokumen') is-invalid @enderror">
              @error('file_dokumen')
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
      <form action="/dokumen" method="get">
        <div class="d-flex justify-content-between">
          <div style="width: 30%;">
            <div class="input-group">
              <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              <input type="text" class="form-control" placeholder="Pencarian" name="dokumen_search" value="{{ request('dokumen_search') }}">
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
            <th scope="col" class="text-dark font-weight-bold">#</th>
            <th scope="col" class="text-dark font-weight-bold">Dokumen Berkala</th>
            <th scope="col" class="text-dark font-weight-bold">Link Dokumen</th>
            <th scope="col" class="text-dark font-weight-bold" style="width: 20% !important;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data_dokumen as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_dokumen }}</td>
                <td>{{ $item->link_dokumen }}</td>
                <td class="text-center">
                  <a href="{{ $item->link_dokumen }}" target="blank" class="badge badge-info rounded text-white border-0"><i class="fas fa-eye" style="margin-left: 1.5px; padding: 0 3px"></i></a>
                  <button class="badge badge-warning rounded text-white border-0" onclick="formUbah{{ $item->id }}()"><i class="fas fa-edit" style="margin-left: 3px; padding: 0 3px"></i></button>
                  <div class="form-container" id="formubah{{ $item->id }}">
                    <div class="form-content">
                      <div class="text-right m-custom">
                        <button class="btn-custom text-right" onclick="formUbah{{ $item->id }}()" style="font-size: 23px; font-weight: 700;">×</button>
                      </div>
                      <form action="/dokumen/{{ $item->id }}" method="post" enctype="multipart/form-data" class="text-left">
                          @method('patch')
                          @csrf
                          <div class="form-group mb-4">
                            <label class="pl-2 m-0 text-dark">Nama Dokumen</label>
                            <input type="text" name="nama_dokumen" class="form-control form-custom @error('nama_dokumen') is-invalid @enderror" placeholder="nama dokumen">
                            @error('nama_dokumen')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <input type="hidden" name="id" value="{{ $item->id }}">
                          <div class="form-group">
                            <input type="hidden" name="nama_file_dokumen_lama" value="{{ $item->nama_file_dokumen }}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label class="pl-2 m-0 text-dark">Upload File</label>
                            <input type="file" name="file_dokumen" class="form-control-file form-custom @error('file_dokumen') is-invalid @enderror">
                            @error('file_dokumen')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <button type="submit" class="btn btn-warning" style="border-radius: 3px !important;">Ubah</button>
                      </form>
                    </div>
                  </div>
                  <form action="/dokumen/{{ $item->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <input type="hidden" name="nama_file_dokumen" value="{{ $item->nama_file_dokumen }}">
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
    <div class="d-flex justify-content-end">
      {{ $data_dokumen->links() }}
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

@push('js')
  <script>
    function formTambah() {
      var form = document.getElementById("formtambah")
      if(form.style.display === "flex") {
        form.style.display = "none"
      } else {
        form.style.display = "flex"
      }
    }
  </script>

  @foreach ($data_dokumen as $item)
  <script>
    function formUbah{{ $item->id }}() {
      var form = document.getElementById("formubah{{ $item->id }}")
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