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
        <h3 class="card-title">Header Retur Pembelian - 24</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trHeaderRetPemSpBbm.add') }}" method="POST">
         @csrf        
        <div class="card-body">
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>No Ref</label>
                  <input type="text" class="form-control" id="no_ref" name="no_ref" placeholder="" value="0139{{ App\Http\Controllers\RetPemSpBbmController::getNewNoRef('0139'); }}" autofocus>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>SPPB</label>
                  <input type="text" class="form-control" id="no_sppb" name="no_sppb" placeholder="" value="N0139/{{ App\Http\Controllers\RetPemSpBbmController::getNewNoBpm('0139'); }}">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tanggal</label>
                  <input type="text" class="form-control" name="tgl_rp_sp_bbm" value="{{ old('tgl_rp_sp_bbm') }}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label>Area</label>                
                  <select class="form-control" name="kd_area" id="kd_area" style="width: 100%;">
                    <option value="0139">0139-CAMP BTJ</option>
                    <option value="0100">0100-PUSAT BTJ</option>
                    <option value="0124">0124-CABANG BTJ</option>
                    <option value="0539">0539-CAMP BTS</option>                     
                  </select>
              </div>
            </div>            
            <div class="col-sm-3">
              <div class="form-group">
                <label>Supplier</label>
                  <select class="form-control select2" name="supplier" id="supplier" style="width: 100%;">
                    <option value="" selected="selected">-- Supplier --</option>
                    <?php
                      $valsp = old('supplier');
                    ?>
                    @foreach ($supplier as $sp)
                      <option value="{{ $sp->kode_supp }}" {{ $valsp == $sp->kode_supp ? 'selected' : '' }}>{{ $sp->nama_supp }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Keterangan</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
              </div>
            </div>
           <input type="hidden" class="form-control" id="kode_periode" name="kode_periode" value="{{ App\Http\Controllers\RetPemSpBbmController::getKodePeriodeOperasional(); }}">             
          </div>
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
        <table id="trHeaderRetPemSpBbm" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No Ref</th>
            <th>No SPPB</th>  
            <th>Area</th>
            <th>Supplier</th>          
            <th>Keterangan</th>            
            <th>Tanggal</th>
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
                <form action="{{ route('trHeaderRetPemSpBbmDestroy.del') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      Apakah Anda yakin akan menghapus nomor 
                      <span id="sppb"></span> ?
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

$('#trHeaderRetPemSpBbm').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: '{!! route('trHeaderRetPemSpBbm.data') !!}', // memanggil route yang menampilkan data json
  columns: 
  [
    { // mengambil & menampilkan kolom sesuai tabel database
        data: 'no_ref',
        name: 'no_ref'
    },
    {
        data: 'no_sppb',
        name: 'no_sppb'
    },
    {
        data: 'nama',
        name: 'nama'
    },
    {
        data: 'nmsupp',
        name: 'nmsupp'
    },
    {
        data: 'keterangan',
        name: 'keterangan'
    },
    {
        data: 'tgl_rp_sp_bbm',
        name: 'tgl_rp_sp_bbm'
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

$(document).on('click', '.delDetRetPemSpBbm', function() {
    let id = $(this).attr('data-id');
    let sppb = $(this).attr('data-sppb');
    $('#id-destroy').val(id);
    $('#id-destroy2').html(id);
    $('#sppb').html(sppb);
});
</script> 
@stop