@extends('template')
@section('content')
<!-- Content Header (Page header) -->
    <!-- Default box -->
    <br>
    @if(session('success'))
    <p class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('success') }}</p>
    @endif

    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>{{ $error }}</p>
      @endforeach
    @endif
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Add Form</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      
      <form class="form-horizontal" action="{{ route('kupas.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_kupas" name="kode_kupas" placeholder="Kode Kupas" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="Nama Kupas" class="col-sm-2 col-form-label">Nama Kupas</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_kupas" name="nama_kupas" placeholder="Nama Kupas">
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
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kode Kupas</th>
            <th>Nama Kupas</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($kupas as $etr)
            <tr>              
                <td>{{ $etr->kode_kupas }}</td>
                <td>{{ $etr->nama_kupas }}</td>
            </tr>
            @endforeach                     
          </tbody>
          <tfoot>
          <tr>
            <th>Kode Kupas</th>
            <th>Nama Kupas</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection