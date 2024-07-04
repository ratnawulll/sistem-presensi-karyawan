@extends('layouts.layout')
@section('content')
<title>Edit Data Karyawan</title>
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Edit Data</h6>
</div>
<div class="card-body">
    <div class="x_content">
            <form action="/karyawan/update" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="">NIK</label>
                      <input type="text" name="nik" class="form-control" value="{{$karyawan->nik}}" required placeholder="Masukan NIK">
                    </div>
                  <div class="form-group">
                    <label for="">Nama Karyawan</label>
                    <input type="text" name="name" class="form-control" value="{{$karyawan->nama}}" required placeholder="Masukan karyawan">
                    <input type="hidden" name="id_Karyawan" class="form-control" value="{{$karyawan->id_Karyawan}}" required>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $karyawan->user->email }}" required>
                </div>
                  <div class="form-group">
                    <label for="">No Telp</label>
                    <input type="text" name="no_telp" class="form-control" value="{{ $karyawan->no_telp }}" required>
                </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input rows="3" type="textarea" name="alamat" class="form-control" value="{{$karyawan->alamat}}" required placeholder="Masukan Alamat">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                      <option value="Aktif"  {{ $karyawan->status == 'Aktif' ? 'selected': '' }}>Aktif</option>
                      <option value="Tidak Aktif" {{ $karyawan->status == 'Tidak Aktif' ? 'selected': '' }}>Tidak Aktif</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin">
                      <option value="L" {{ $karyawan->jenis_kelamin == 'L' ? 'selected': '' }}>Laki - laki</option>
                      <option value="P" {{ $karyawan->jenis_kelamin == 'P' ? 'selected': '' }}>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="peraturan">Peraturan</label>
                    <select name="peraturan" id="peraturan" required>
                      <option value="" selected disabled>Pilih peraturan</option>
                      @foreach ($peraturans as $peraturan)
                      <option value="{{ $peraturan->id_Peraturan }}" {{ count($karyawan->peraturans) ?($karyawan->peraturans[0]->id_Peraturan == $peraturan->id_Peraturan ? 'selected': '') : '' }}>{{ $peraturan->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div>
    </div>
@endsection