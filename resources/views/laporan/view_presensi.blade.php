@extends('layouts.layout')
@section('content')
<title>Data Presensi Karyawan</title>

<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Data Presensi</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
      <br>
      <table id="dataTable" class="table table-bordered" cellspacing="0">
          <thead>
            <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Jam Masuk</th>
                  <th>Jam Keluar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($presensi_histories as $i => $u)
            <tr class="data-row">
              <td class="align-middle iteration">{{ ++$i }}</td>
              <td class="align-middle">{{ $u->karyawan->nik }}</td>
              <td class="align-middle">{{ $u->nama }}</td>
              <td class="align-middle">{{ $u->tanggal }}</td>
              <td class="align-middle">{{ $u->jam_masuk }}</td>
              <td class="align-middle">{{ $u->jam_keluar }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
</div>
@endsection