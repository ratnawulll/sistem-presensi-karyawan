@extends('layouts.layout')
@section('content')
<title>Data Karyawan</title>

<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Data Karyawan</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
    <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Karyawan</button>
      <br>
      <br>
      <table id="dataTable" class="table table-bordered" cellspacing="0">
          <thead>
            <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Status</th>
                  <th>Jenis Kelamin</th>
                  <th>No Telp</th>
                  <th>#</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($karyawan as $i => $u)
            <tr class="data-row">
              <td class="align-middle iteration">{{ ++$i }}</td>
              <td class="align-middle">{{ $u->nik }}</td>
              <td class="align-middle id_nama">{{ $u->nama }}</td>
              <td class="align-middle">{{ $u->alamat }}</td>
              <td class="align-middle">{{ $u->status }}</td>
              <td class="align-middle">{{ $u->jenis_kelamin }}</td>
              <td class="align-middle">{{ $u->no_telp }}</td>
              <td>  
                <div class="row">
                   <a href="/karyawan/edit/{{ $u->id_Karyawan}}" class="btn btn-primary btn-sm ml-2">Edit</a>
                   <form action="/karyawan/hapus/{{ $u->id_Karyawan }}" method="post" style="display: inline;">
                       {{ csrf_field() }}
                       {{ method_field('DELETE') }}
                       <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus data karyawan ini?')">Hapus</button>
                   </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Masukan Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/karyawan/store" method="post">
          {{ csrf_field() }}
        <div class="form-group">
          <label for="">NIK</label>
          <input type="text" name="nik" class="form-control" required placeholder="Masukan NIK">
        </div>
        <div class="form-group">
            <label for="">Nama Karyawan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" name="email" class="form-control" required>
      </div>
        <div class="form-group">
          <label for="">No Telp</label>
          <input type="text" name="no_telp" class="form-control" required>
      </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input rows="3" type="textarea" name="alamat" class="form-control" required placeholder="Masukan Alamat">
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select name="status" id="status">
            <option value="Aktif" selected>Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
          </select>
        </div>
        <div class="form-group">
          <label for="jenis_kelamin">Jenis Kelamin</label>
          <select name="jenis_kelamin" id="jenis_kelamin">
            <option value="L" selected>Laki - laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="peraturan">Peraturan</label>
          <select name="peraturan" id="peraturan" required>
            <option value="" selected disabled>Pilih peraturan</option>
            @foreach ($peraturans as $peraturan)
            <option value="{{ $peraturan->id_Peraturan }}">{{ $peraturan->nama }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    </div>
    </div>
  </div>
</div>
@endsection