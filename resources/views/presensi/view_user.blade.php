@extends('layouts.layout')
@section('content')
<title>Data Peraturan</title>

<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Data Peraturan</h6>
</div>
<div class="card-body">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Absensi Hari ini <?php $now = \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('d-M-Y H:i'); echo $now;?>                
            </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if (!$presensi || !$presensi_registered)
        <form id="form_presensi" role="form" method="post" action="/presensi/store" >
        @else
        <form id="form_presensi" role="form" method="post" action="/presensi/update" >
            @method('PUT')
        @endif
            @csrf
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            @if ($presensi)
                            <input type="hidden" name="id_presensi" class="form-control" value="{{$presensi->id_Presensi}}" required>
                            @endif
                            <input type="hidden" name="karyawan" class="form-control" value="{{$id_karyawan}}" required>
                            <label for="entry_time">Waktu Absensi</label>
                            <input
                            type="text"
                            class="form-control text-center"
                            name="entry_time"
                            id="entry_time"
                            placeholder="--:--:--"
                            readonly
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exit_time">Waktu Selesai</label>
                            <input
                            type="text"
                            class="form-control text-center"
                            name="exit_time"
                            id="exit_time"
                            placeholder="--:--:--"
                            readonly
                            />
                        </div>
                    </div>
                </div>
            </div>
            @if (!$is_cuti)
            <div class="card-footer" >
                @if ($is_peraturan)
                    @if (!$presensi_registered)
                    <button type="submit" class="btn btn-primary p-3" id="masuk" style="font-size:1.2rem">
                        Absen Masuk
                    </button>    
                    @else
                    <button type="submit" class="btn btn-info pull-right p-3" id="keluar" style="font-size:1.2rem">
                        Absen Keluar/Selesai
                    </button>
                    @endif
                @else
                <div class="alert alert-info" role="alert">
                    Sekarang bukan jam kerja anda!
                </div>
                @endif
            </div>
            @else
            <div class="alert alert-info" role="alert">
                Anda sedang cuti, enjoy!
            </div> 
            @endif
        </form>

        
</div>

<div id="modal_keluar" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <h6>Apakah anda yakin akan absen pulang ?</h6>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger" id="exit">Ya</button>
        </div>
      </form>
      </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
var id_peraturan = {!! $id_peraturan !!}
$.ajax({
    url: "{{route('api.peraturan.all')}}",
    type: 'GET',
    success: function(response) {
        let datas = response.data;
        let data_peraturan = null;
        if (datas.length > 0) {
            data_peraturan = datas.find(el => el.id_Peraturan == id_peraturan);
            if (data_peraturan) {
                $('#entry_time').val(data_peraturan.jam_masuk);
                $('#exit_time').val(data_peraturan.jam_pulang);
            }
        }
    },
    error: function(xhr, status, error) {
        alert('Error get data peraturan');
        console.error(error);
    }
});

$('#keluar').on('click', function(event){
        // Mencegah tindakan default
        event.preventDefault();
    console.log('masuk');
        // Membuka modal
        $('#modal_keluar').modal('show');
    });

});

$('#exit').on('click', function(event){
    // Mencegah tindakan default
    event.preventDefault();
    let jam = new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: false});
    let input_jam = $('<input>').attr('type', 'hidden').attr('name', 'jam').val(jam);
    $('#form_presensi').append(input_jam);
    // Submit form
    $('#form_presensi').submit();
});

$('#masuk').on('click', function(event){
    // Mencegah tindakan default
    event.preventDefault();
    let jam = new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: false});
    let input_jam = $('<input>').attr('type', 'hidden').attr('name', 'jam').val(jam);
    $('#form_presensi').append(input_jam);
    // Submit form
    $('#form_presensi').submit();
});

</script>
@endpush