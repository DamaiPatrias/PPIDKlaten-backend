@extends('main')

@section('main-content')
<div class="card">
  <div class="card-body" style="border-bottom: 1px solid #f4f4f4;">
    <div class="mb-3">
      <form action="/keberatan-informasi" method="get">
        <div class="d-flex justify-content-between">
          <div style="width: 30%;">
            <div class="input-group">
              <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              <input type="text" class="form-control" placeholder="Pencarian" name="keberatan_informasi_search" value="{{ request('keberatan_informasi_search') }}">
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
            <th scope="col" class="text-dark font-weight-bold">Nomer Registrasi</th>
            <th scope="col" class="text-dark font-weight-bold">Nama Lengkap</th>
            <th scope="col" class="text-dark font-weight-bold">Nama Lengkap Kuasa</th>
            @auth
            <th scope="col" class="text-dark font-weight-bold">Aksi</th>
            @endauth
          </tr>
        </thead>
        <tbody>
          @foreach ($data_keberatan_informasi as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->nomer_registrasi_permohonan_informasi }}</td>
              <td>{{ $item->nama_lengkap }}</td>
              <td>{{ $item->nama_lengkap_kuasa }}</td>
              @auth
              <td>
                <a href="/keberatan-informasi/{{ $item->id }}" target="blank" class="badge badge-info rounded text-white border-0"><i class="fas fa-eye" style="margin-left: 1.5px; padding: 0 3px"></i></a>
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
      {{ $data_keberatan_informasi->links() }}
    </div>
  </div>
</div>

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

<script>
  function Form() {
    var form = document.getElementById("myForm")
    if(form.style.display === "flex") {
      form.style.display = "none"
    } else {
      form.style.display = "flex"
    }
  }
</script>
@endsection