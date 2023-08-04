
@extends('template')
@section('content')
<!-- Content Header (Page header) -->

    <!-- Default box -->
    <br>
    @if(session('success'))
      <p class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('success') }}</p>
    @endif

    @if(session('error'))
      <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('error') }}</p>
    @endif

    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ $error }}</p>
      @endforeach
    @endif
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Header Pindah Gudang</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trHeaderPb.add') }}" method="POST">
         @csrf        
        <div class="card-body">          
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>No PB</label>
                  <input type="text" class="form-control" id="no_pb" name="no_pb" placeholder="" value="{{ App\Http\Controllers\PermintaanBarangController::getNewNoRef('0139'); }}" autofocus>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tanggal</label>
                  <input type="text" class="form-control" name="tgl_pb" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Kode Area</label>                
                  <select class="form-control" name="kd_area" id="kd_area" style="width: 100%;">
                    <option value="0139">CAMP BTJ</option>
                    <option value="0100">PUSAT BTJ</option>
                    <option value="0124">CABANG BTJ</option>                     
                  </select>
              </div>
            </div>            
            <div class="col-sm-4">
              <div class="form-group">
                <label>Kode Unit</label>
                  <input type="text" class="form-control" id="kd_unit" name="kd_unit" placeholder="" value="">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Status</label>
                  <input type="text" class="form-control" id="status_pb" name="status_pb" style="color: red;" value="">
              </div>
            </div>
           <input type="hidden" class="form-control" id="kode_periode" name="kode_periode" value="{{ App\Http\Controllers\UserController::getKodePeriodeOperasional(); }}"> 
           <input type="hidden" class="form-control" id="kepada" name="kepada" value="Bpk. Leonard HR">            
          </div>
          <fieldset class="form-group border p-3">
          <legend class="w-auto px-2"><h6>Disetujui</h6></legend>
          <div class="row">              
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Camp Manager</label>
                      <input type="text" class="form-control" id="camp_manager" name="camp_manager" placeholder="" value="STEIMBERT LUMINGKEWAS">
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Kepala Gudang</label>
                      <input type="text" class="form-control" id="kepala_gudang" name="kepala_gudang" placeholder="" value="PURWANTO">
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Kepala Mekanik</label>
                      <input type="text" class="form-control" id="kepala_mekanik" name="kepala_mekanik" placeholder="" value="MUHIDIN">
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Mekanik</label>
                      <input type="text" class="form-control" id="mekanik" name="mekanik" placeholder="" value="MUHIDIN">
                  </div>
                </div>            
          </div>
          </fieldset>
        <!-- /.card-body -->
        </div>
        <div class="card-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
        <!-- /.card-footer -->
      </form>              
    </div>
      <!-- /.card -->
    
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="trHeaderPb" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No PB</th>
            <th>Tanggal</th>  
            <th>Kode Area</th>          
            <th>Kode Unit</th>            
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('trHeaderPbDestroy.del') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      Apakah Anda yakin akan menghapus
                      <span id="dakod"></span> ?
                      <input type='hidden' name='del_id' id='id-destroy'>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <button type="submit" class="btn btn-danger">Ya</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('custom-js')
<script type="text/javascript">
//$('.select2-basic').select2();

$('#kel_brg').on('change', function (e) { 
    var kel_brg = $('#kel_brg').find(':selected').data('gjam');
    // var kel_brg = document.getElementById('kel_brg');
    $('#kd_brg').val(kel_brg);
});

$('#trHeaderPb').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('trHeaderPb.data') !!}', // memanggil route yang menampilkan data json
  columns: 
  [
    { // mengambil & menampilkan kolom sesuai tabel database
        data: 'no_pb',
        name: 'no_pb'
    },
    {
        data: 'tgl_pb',
        name: 'tgl_pb'
    },
    {
        data: 'kd_area',
        name: 'kd_area'
    },
    {
        data: 'kd_unit',
        name: 'kd_unit'
    },
    {
        data: 'status_pb',
        name: 'status_pb'
    }, 
    {
        data: 'action',
        name: 'action',
        orderable: false, 
        searchable: false
    }
  ],
});

$(document).on('click', '.editStInvent', function() {
    let id = $(this).attr('data-id');

    $.ajax({
        type: 'GET',
        url: "{{ URL::to('stInvent/showedit')}}"+"/"+id
    }).done( function( response ) {
        $('#editForm').html(response.html);
    });
});

$(document).on('click', '.delStInvent', function() {
    let id = $(this).attr('data-id');
    let dakod = $(this).attr('data-kode');
    $('#id-destroy').val(id);
    $('#dakod').html(dakod);
});
</script> 
@stop