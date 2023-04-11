@extends('template')
@section('content')
<br>
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif

@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
  @endforeach
@endif
<div class="card card">
  <div class="card-header">
    <h3 class="card-title">Add Form</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  
  <form class="form-horizontal" action="{{ route('sts_pemakaian.add') }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="account" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode" autofocus="autofocus">
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Keterangan</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
        </div>
      </div>
    </div>
    <!-- /.card-body -->
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
    <table id="stsPemakaian_dt" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Kode</th>
        <th>Keterangan</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($stsPemakaian as $etr)
        <tr>              
            <td>{{ $etr->kode }}</td>
            <td>{{ $etr->keterangan }}</td>
        </tr>
        @endforeach                     
      </tbody>
      <tfoot>
      <tr>
        <th>Kode</th>
        <th>Keterangan</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@stop
@section('custom-js')
  <script type="text/javascript">
    $("#stsPemakaian_dt").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "order": [],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#stsPemakaian_dt_wrapper .col-md-6:eq(0)');

  </script> 
 @stop