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
  
  <form class="form-horizontal" action="{{ route('lokasi.add') }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="account" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="kode_lokasi" name="kode_lokasi" placeholder="Kode Lokasi" autofocus="autofocus">
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Nama Lokasi</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" placeholder="Nama Lokasi">
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
    <table id="lokasi_dt" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Kode Lokasi</th>
        <th>Nama Lokasi</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($lokasi as $etr)
        <tr>              
            <td>{{ $etr->kode_lokasi }}</td>
            <td>{{ $etr->nama_lokasi }}</td>
        </tr>
        @endforeach                     
      </tbody>
      <tfoot>
      <tr>
        <th>Kode Lokasi</th>
        <th>Nama Lokasi</th>
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
    $("#lokasi_dt").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "order": [],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#lokasi_dt_wrapper .col-md-6:eq(0)');

  </script> 
 @stop