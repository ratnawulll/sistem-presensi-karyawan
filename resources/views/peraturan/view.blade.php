@extends('layouts.layout')
@section('content')
<title>Data Peraturan</title>

<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Data Peraturan</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
    <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Peraturan</button>
      <br>
      <br>
      <table id="dataTable" class="table table-bordered" cellspacing="0">
          <thead>
            <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Jam Masuk</th>
                  <th>Batas Jam Masuk</th>
                  <th>Jam Pulang</th>
                  <th>Batas Jam Pulang</th>
                  <th>#</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($peraturan as $i => $u)
            <tr class="data-row">
              <td class="align-middle iteration">{{ ++$i }}</td>
              <td class="align-middle">{{ $u->nama }}</td>
              <td class="align-middle id_nama">{{ $u->description}}</td>
              <td class="align-middle">{{ $u->jam_masuk }}</td>
              <td class="align-middle">{{ $u->batas_jam_masuk }}</td>
              <td class="align-middle">{{ $u->jam_pulang }}</td>
              <td class="align-middle">{{ $u->batas_jam_pulang }}</td>
              <td>  
                <div class="row">
                   <a href="/peraturan/edit/{{ $u->id_Peraturan}}" class="btn btn-primary btn-sm ml-2">Edit</a>
                   <form action="/peraturan/hapus/{{ $u->id_Peraturan }}" method="post" style="display: inline;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus data peraturan ini?')">Hapus</button>
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
      <form action="/peraturan/store" method="post">
          {{ csrf_field() }}
        <div class="form-group">
            <label for="">Peraturan</label>
            <input type="text" name="nama" class="form-control"  required>
        </div>
        <div class="form-group">
          <label for="">Deskripsi</label>
          <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Jam Masuk</label>
          <div class="row">
            <div class="col-4">
              <input type="number" name="jam" class="form-control">
            </div>
            <div class="col-1" style="text-align: center;">:</div>
            <div class="col-4">
              <input type="number" name="menit" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Batas Jam Masuk</label>
          <div class="row">
            <div class="col-4">
              <input type="number" name="jam_batas" class="form-control">
            </div>
            <div class="col-1" style="text-align: center;">:</div>
            <div class="col-4">
              <input type="number" name="menit_batas" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Jam Pulang</label>
          <div class="row">
            <div class="col-4">
              <input type="number" name="jam_pulang" class="form-control">
            </div>
            <div class="col-1" style="text-align: center;">:</div>
            <div class="col-4">
              <input type="number" name="menit_pulang" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Batas Jam Pulang</label>
          <div class="row">
            <div class="col-4">
              <input type="number" name="jam_pulang_batas" class="form-control">
            </div>
            <div class="col-1" style="text-align: center;">:</div>
            <div class="col-4">
              <input type="number" name="menit_pulang_batas" class="form-control">
            </div>
          </div>
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