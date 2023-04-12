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
  
  <form class="form-horizontal" action="{{ route('warehouse.add') }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="account" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="kode_wh" name="kode_wh" placeholder="Kode" autofocus="autofocus">
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Nama Warehouse</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nama_wh" name="nama_wh" placeholder="Nama Warehouse">
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
    <table id="warehouse_dt" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Kode</th>
        <th>Nama Warehouse</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($warehouse as $etr)
        <tr>              
            <td>{{ $etr->kode_wh }}</td>
            <td>{{ $etr->nama_wh }}</td>
        </tr>
        @endforeach                     
      </tbody>
      <tfoot>
      <tr>
        <th>Kode</th>
        <th>Nama Warehouse</th>
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
    $("#warehouse_dt").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "order": [],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#warehouse_dt_wrapper .col-md-6:eq(0)');

  </script> 
 @stop