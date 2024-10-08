@extends('template')
@section('content')
<div class="card card">
  <div class="card-header">
    <h3 class="card-title">Reporting Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->

  <form class="form-horizontal" action="{{ route('spRincPemPerUnit.rpt') }}" method="POST">
     @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Tgl Awal</label><br>
              <input type="date" class="form-control" id="start_date" name="start_date" value="" autofocus="autofocus">
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label>Tgl Akhir</label><br>
              <input type="date" class="form-control" id="end_date" name="end_date" value="">
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