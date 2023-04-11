@extends('template')
@section('content')
<!-- Content Header (Page header) -->
{{-- <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>@yield('title', $title)</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">@yield('title', $title)</a></li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section> --}}
    <!-- Default box -->
    <br>    
    
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="trHistory" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>No Btg</th>
            <th>Lokasi</th>
          </tr>
          </thead>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    
@endsection