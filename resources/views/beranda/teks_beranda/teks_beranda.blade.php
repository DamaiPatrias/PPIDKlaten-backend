@extends('main')

@section('main-content')
<div class="card">
  <div class="card-body text-dark">
    @foreach ($data_teks_beranda as $item)
    <div class="mb-3">
      <h5>{{ $item->judul_beranda }}</h5>
      <form action="/teks-beranda/{{ $item->id }}" method="post">
        @method('patch')
        @csrf
        <div class="form-group">
          <label for="judul_{{ $item->id }}">Judul {{ $item->judul_beranda }}</label>
          <input type="text" class="form-control" id="judul_{{ $item->id }}" value="{{ $item->judul_beranda }}" name="judul_beranda">
        </div>
        <div class="form-group">
          <label for="teks_{{ $item->id }}">Teks {{ $item->judul_beranda }}</label>
          <textarea class="form-control" id="teks_{{ $item->id }}" style="height: 120px; resize: none;" name="teks_beranda">{{ $item->teks_beranda }}</textarea>
        </div>
        <div class="text-right">
          <button type="reset" class="btn btn-info mr-2"><i class="fas fa-redo"></i> Reset</button>
          <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</button>
        </div>
      </form>
    </div>
    @endforeach
    {{-- <div class="mb-3">
      <h5>Menu Berkala</h5>
      <form action="">
        <div class="form-group">
          <label for="judul_pertama">Judul Berkala</label>
          <input type="text" class="form-control" id="judul_pertama" value="">
        </div>
        <div class="form-group">
          <label for="teks_pertama">Teks Berkala</label>
          <textarea class="form-control" id="teks_pertama" style="height: 120px; resize: none;"></textarea>
        </div>
        <div class="text-right">
          <button type="reset" class="btn btn-info mr-2"><i class="fas fa-redo"></i> Reset</button>
          <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</button>
        </div>
      </form>
    </div>
    <div class="mb-3">
      <h5>Menu Serta Merta</h5>
      <form action="">
        <div class="form-group">
          <label for="judul_kedua">Judul Serta Merta</label>
          <input type="text" class="form-control" id="judul_kedua">
        </div>
        <div class="form-group">
          <label for="teks_kedua">Teks Serta Merta</label>
          <textarea class="form-control" id="teks_kedua" style="height: 120px; resize: none;"></textarea>
        </div>
        <div class="text-right">
          <button type="reset" class="btn btn-info mr-2"><i class="fas fa-redo"></i> Reset</button>
          <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</button>
        </div>
      </form>
    </div>
    <div>
      <h5>Menu Setiap Saat</h5>
      <form action="">
        <div class="form-group">
          <label for="judul_ketiga">Judul Setiap Saat</label>
          <input type="text" class="form-control" id="judul_ketiga">
        </div>
        <div class="form-group">
          <label for="teks_ketiga ">Teks Setiap Saat</label>
          <textarea class="form-control" id="teks_ketiga" style="height: 120px; resize: none;"></textarea>
        </div>
        <div class="text-right">
          <button type="reset" class="btn btn-info mr-2"><i class="fas fa-redo"></i> Reset</button>
          <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</button>
        </div>
      </form>
    </div> --}}
  </div>
</div>
@endsection