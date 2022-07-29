@extends('main')

@section('main-content')
<div class="card">
  <div class="card-header">
    <button class="btn btn-success" onclick="formTambah()" style="border-radius: 3px !important;">Tambah Data</button>
    <div class="form-container" id="myForm" 
    @error('maklumat')
        style="display: flex !important"
    @enderror >
      <div class="form-content">
        <div class="mb-4">
          <div class="border-bottom px-2">
            <span class="h4 font-weight-bold">Tambah Data</span>
          </div>
          <div class="text-right m-custom">
            <button class="btn-custom text-right" onclick="formTambah()" style="font-size: 25px; font-weight: 700;">×</button>
          </div>
        </div>
        <form action="/maklumat" method="post">
          @csrf
            <div class="form-group mb-4">
              <label class="pl-2 m-0 text-dark">Maklumat</label>
              <textarea name="maklumat" class="form-control @error('maklumat') is-invalid @enderror" style="resize: none; height: 120px;"></textarea>
              @error('maklumat')
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
      <form action="/maklumat" method="get">
        <div class="d-flex justify-content-between">
          <div style="width: 30%;">
            <div class="input-group">
              <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              <input type="text" class="form-control" placeholder="Pencarian" name="maklumat_search" value="{{ request('maklumat_search') }}">
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-striped m-0">
        <thead>
          <tr>
            <th scope="col" class="text-dark font-weight-bold text-center" style="width: 10%">No.</th>
            <th scope="col" class="text-dark font-weight-bold">Maklumat</th>
            <th scope="col" class="text-dark font-weight-bold" style="width: 15%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data_maklumat as $item)
            <tr>
              <td class="text-center">{{ $item->id }}</td>
              <td>{{ $item->maklumat }}</td>
              <td class="text-center">
                <button class="badge badge-warning rounded text-white border-0" onclick="formUbah{{ $item->id }}()"><i class="fas fa-edit" style="margin-left: 1.5px; padding: 0 3px"></i></button>
                <div class="form-container" id="formubah{{ $item->id }}" 
                @error('maklumat')
                    style="display: flex !important"
                @enderror >
                  <div class="form-content" style="text-align: left !important;">
                    <div class="mb-4">
                      <div class="border-bottom px-2" style="text-align: left !important;">
                        <span class="h4 font-weight-bold">Ubah Data</span>
                      </div>
                      <div class="text-right m-custom">
                        <button class="btn-custom text-right" onclick="formUbah{{ $item->id }}()" style="font-size: 25px; font-weight: 700;">×</button>
                      </div>
                    </div>
                    <form action="/maklumat/{{ $item->id }}" method="post">
                      @method('patch')
                      @csrf
                        <div class="form-group mb-4">
                          <label class="pl-2 m-0 text-dark">Maklumat</label>
                          <textarea name="maklumat" class="form-control @error('maklumat') is-invalid @enderror" style="resize: none; height: 120px;">{{ old('maklumat', $item->maklumat) }}</textarea>
                          @error('maklumat')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-warning" style="border-radius: 3px !important;">Ubah</button>
                    </form>
                  </div>
                </div>
                <form action="/maklumat/{{ $item->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge badge-danger rounded border-0" onclick="return confirm('Apakah anda mau menghapusnya ?')"><i class="fas fa-times" style="margin-left: 1.5px; padding: 0 3px"></i></button>
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
      {{ $data_maklumat->links() }}
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
      margin-top: -55px;
      margin-right: 0px; 
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
      var form = document.getElementById("myForm")
      if(form.style.display === "flex") {
        form.style.display = "none"
      } else {
        form.style.display = "flex"
      }
    }
  </script>

  @foreach ($data_maklumat as $item)
    <script>
      function formUbah{{ $item->id }}() {
        var form = document.getElementById('formubah{{ $item->id }}')
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