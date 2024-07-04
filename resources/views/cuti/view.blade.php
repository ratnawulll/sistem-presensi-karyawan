@extends('layouts.layout')
@section('content')
<title>Data Cuti</title>

<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Data Cuti</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
    <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data Cuti</button>
      <br>
      <br>
      <table id="dataTable" class="table table-bordered" cellspacing="0">
          <thead>
            <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Jenis Cuti</th>
                  <th>Mulai Cuti</th>
                  <th>Selesai Cuti</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cutis as $i => $u)
            <tr class="data-row">
              <td class="align-middle iteration">{{ ++$i }}</td>
              <td class="align-middle">{{ $u->nama }}</td>
              <td class="align-middle">{{ $u->status }}</td>
              <td class="align-middle">{{ $u->jenis_cuti }}</td>
              <td class="align-middle">{{ $u->mulai_cuti }}</td>
              <td class="align-middle">{{ $u->selesai_cuti }}</td>
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
      <form action="/cuti/store" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="karyawan">Karyawan</label>
            <select name="karyawan" id="karyawan" required>
              <option value="" selected disabled>Pilih karyawan</option>
              @foreach ($karyawans as $karyawan)
              <option value="{{ $karyawan->id_Karyawan }}">{{ $karyawan->nama }}</option>
              @endforeach
            </select>
          </div>
        <div class="form-group">
          <label for="">Mulai Cuti</label>
          <input type="date" name="mulai_cuti" class="form-control" required>
      </div>
        <div class="form-group">
          <label for="">Selesai Cuti</label>
          <input type="date" name="selesai_cuti" class="form-control" required>
      </div>
        <div class="form-group">
          <label for="alamat">Keterangan</label>
          <input rows="3" type="textarea" name="keterangan" class="form-control" required placeholder="Masukan Keterangan">
        </div>
        <div class="form-group">
          <label for="status">Jenis Cuti</label>
          <select name="jenis_cuti" id="jenis_cuti">
            <option value="Ijin" selected>Ijin</option>
            <option value="Tahunan">Tahunan</option>
            <option value="Sakit">Sakit</option>
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