@extends('layouts.layout')
@section('content')
<title>Edit Data Peraturan</title>
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Edit Data</h6>
</div>
<div class="card-body">
    <div class="x_content">
            <form action="/peraturan/update" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="">Nama Peraturan</label>
                      <input type="text" name="nama" class="form-control" value="{{$peraturan->nama}}" required placeholder="Masukan Nama">
                      <input type="hidden" name="id_Peraturan" class="form-control" value="{{$peraturan->id_Peraturan}}" required>
                    </div>
                  <div class="form-group">
                    <label for="alamat">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" value="{{$peraturan->description}}" required >
                  </div>
                  <div class="form-group">
                    <label for="">Jam Masuk</label>
                    <div class="row">
                      <div class="col-4">
                        <input type="number" name="jam" class="form-control" value="{{ intval(Carbon\Carbon::parse($peraturan->jam_masuk)->format('H')) }}">
                      </div>
                      <div class="col-1" style="text-align: center;">:</div>
                      <div class="col-4">
                        <input type="number" name="menit" class="form-control" value="{{ intval(Carbon\Carbon::parse($peraturan->jam_masuk)->format('i')) }}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Batas Jam Masuk</label>
                    <div class="row">
                      <div class="col-4">
                        <input type="number" name="jam_batas" class="form-control" value="{{ intval(Carbon\Carbon::parse($peraturan->batas_jam_masuk)->format('H')) }}">
                      </div>
                      <div class="col-1" style="text-align: center;">:</div>
                      <div class="col-4">
                        <input type="number" name="menit_batas" class="form-control" value="{{ intval(Carbon\Carbon::parse($peraturan->batas_jam_masuk)->format('i')) }}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Jam Pulang</label>
                    <div class="row">
                      <div class="col-4">
                        <input type="number" name="jam_pulang" class="form-control" value="{{ intval(Carbon\Carbon::parse($peraturan->jam_pulang)->format('H')) }}">
                      </div>
                      <div class="col-1" style="text-align: center;">:</div>
                      <div class="col-4">
                        <input type="number" name="menit_pulang" class="form-control" value="{{ intval(Carbon\Carbon::parse($peraturan->jam_pulang)->format('i')) }}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Batas Jam Pulang</label>
                    <div class="row">
                      <div class="col-4">
                        <input type="number" name="jam_pulang_batas" class="form-control" value="{{ intval(Carbon\Carbon::parse($peraturan->batas_jam_pulang)->format('H')) }}">
                      </div>
                      <div class="col-1" style="text-align: center;">:</div>
                      <div class="col-4">
                        <input type="number" name="menit_pulang_batas" class="form-control" value="{{ intval(Carbon\Carbon::parse($peraturan->batas_jam_pulang)->format('i')) }}">
                      </div>
                    </div>
                  </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div>
    </div>
@endsection