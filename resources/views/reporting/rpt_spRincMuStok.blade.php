@extends('template')
@section('content')
<div class="card card">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('spRincMuStok.rpt') }}" method="POST">
     @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Bulan</label><br>
              <select class="form-control" name="bulan" id="bulan" style="width: 100%;">
                <option value="0"> - Pilih Bulan - </option>
                @foreach ($bulan as $key => $data) {
                  <option value="{{ $key+1 }}"> {{ $data }} </option>
                @endforeach
              </select>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Tahun</label>
              <input type="text" class="form-control" name="tahun" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask>
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