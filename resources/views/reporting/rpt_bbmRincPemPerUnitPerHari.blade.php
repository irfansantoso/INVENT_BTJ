@extends('template')
@section('content')
<div class="card card">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('bbmRincPemPerUnitPerHari.rpt') }}" method="POST">
     @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Tgl awal</label>
              <input type="text" class="form-control" value="{{ $dtNow }}" name="tgl_awal" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Tgl akhir</label>
              <input type="text" class="form-control" value="{{ $dtNow }}" name="tgl_akhir" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Sts Pakai</label><br>
              <select class="form-control" name="stsPakai" id="stsPakai" style="width: 100%;">
                  <option value="all">Semua</option>
                  <option value="10">Solar</option>
                  <option value="15">Pelumas</option>
              </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Kode Gudang</label><br>
              <input type="text" class="form-control" name="kd_gudang" value="0139" readonly>
          </div>
        </div>
      </div>
    <!-- /.card-body -->
    </div>
    <div class="card-footer">
      <button class="btn btn-success">Submit</button>
    </div>
    <!-- /.card-footer -->
  </form>              
</div>
  <!-- /.card -->

@endsection