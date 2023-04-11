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
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Header Form</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->

      <form class="form-horizontal" action="{{ route('trHeaderKabuauDrtOutTongkang.add') }}" method="POST">
         @csrf        
        <div class="card-body">          
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>No LKD</label>
                  <input type="text" class="form-control" id="no_tpn_out" name="no_tpn_out" placeholder="" value="LKD/730/{{ App\Http\Controllers\UserController::getNewNoTpkOut('730'); }}-OUT">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tanggal</label>
                  <input type="text" class="form-control" name="tgl_input_tpn_out" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>                
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <label>Trip</label>
                  <input type="text" class="form-control" id="trip" name="trip" placeholder="" value="">
              </div>
            </div>           
            <div class="col-sm-2">
              <div class="form-group">
                <label>Lokasi</label>                
                  <input type="text" class="form-control" name="" value="Kabuau Drt" disabled>
                  <input type="hidden" name="lokasi_tpn" id="lokasi_tpn" value="730">                
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tujuan</label>                
                  <input type="text" class="form-control" name="" value="Tongkang" disabled>
                  <input type="hidden" name="tujuan" id="tujuan" value="800">                
              </div>
            </div>
            <input type="hidden" class="form-control" id="kode_periode" name="kode_periode" value="{{ App\Http\Controllers\UserController::getKodePeriodeOperasional(); }}">             
          </div>
          <div class="row">            
            <div class="col-sm-2">
              <div class="form-group">
                <label>Nama Kapal</label>
                  <select class="form-control select2" name="optMuat" id="optMuat" style="width: 100%;">
                    <option value="" selected="selected">-- Kapal --</option>
                    @foreach ($driver as $drv)
                      <option value="{{ $drv->kode_driver }}">{{ $drv->nama_driver }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Nama Tongkang</label>
                  <select class="form-control select2" name="muatUnit" id="muatUnit" style="width: 100%;">
                    <option value="" selected="selected">-- Tongkang --</option>
                    @foreach ($unitAlat as $una)
                      <option value="{{ $una->kode_unit_a }}">{{ $una->nomor_pintu }}</option>
                    @endforeach
                  </select>
              </div>
            </div>            
            <input type="hidden" class="form-control" id="kode_periode" name="kode_periode" value="{{ App\Http\Controllers\UserController::getKodePeriodeOperasional(); }}">             
          </div>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>No Loglist</label>
                  <input type="text" class="form-control" id="no_loglist" name="no_loglist" placeholder="" value="TKG/800/{{ App\Http\Controllers\UserController::getNewNoTkg('800'); }}-IN" readonly>
              </div>
            </div>
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
        <table id="trHeaderKabuauDrtOutTongkang" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No LKA Out</th>
            <th>Tanggal</th>
            <th>Trip</th>
            <th>Tujuan</th>
            <th>Nm Kapal</th>
            <th>Nm Tongkang</th>
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
                <form action="{{ route('trHeaderKabuauDrtOutTongkangDestroy.del') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      Apakah Anda yakin akan menghapus
                      <span id="id-destroy2"></span> ?
                      <input type='hidden' name='del_id' id='id-destroy'>
                      <input type='hidden' name='notpn_del' id='notpn_del'>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <button type="submit" class="btn btn-danger">Ya</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
@endsection