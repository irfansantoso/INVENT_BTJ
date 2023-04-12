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
  
  <form class="form-horizontal" action="{{ route('supplier.add') }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="account" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="kode_supp" name="kode_supp" placeholder="Kode Supplier" autofocus="autofocus">
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Nama Supplier</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nama_supp" name="nama_supp" placeholder="Nama Supplier">
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-6">
          <textarea class="form-control" id="alamat_supp" name="alamat_supp" placeholder="Alamat Supplier"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Kota</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="kota_supp" name="kota_supp" placeholder="Kota Supplier">
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">PIC</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="pic_supp" name="pic_supp" placeholder="PIC">
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
    <table id="supplier_dt" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Kode</th>
        <th>Nama Supplier</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>PIC</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($supplier as $etr)
        <tr>              
            <td>{{ $etr->kode_supp }}</td>
            <td>{{ $etr->nama_supp }}</td>
            <td>{{ $etr->alamat_supp }}</td>
            <td>{{ $etr->kota_supp }}</td>
            <td>{{ $etr->pic_supp }}</td>
        </tr>
        @endforeach                     
      </tbody>
      <tfoot>
      <tr>
        <th>Kode</th>
        <th>Nama Supplier</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>PIC</th>
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
    $("#supplier_dt").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "order": [],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#supplier_dt_wrapper .col-md-6:eq(0)');

  </script> 
 @stop