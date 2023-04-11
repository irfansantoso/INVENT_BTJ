@extends('template')
@section('content')

    <!-- Default box -->
    <br>
    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
      @endforeach
    @endif
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Add Form</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      
      <form class="form-horizontal" action="{{ route('kayu.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_kayu" name="kode_kayu" placeholder="Contoh 0100" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Nama Kayu</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_kayu" name="nama_kayu" placeholder="Nama Kayu">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">S</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="s_kayu" name="s_kayu" placeholder="">
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
            <th>Kode Kayu</th>
            <th>Nama Kayu</th>
            <th>S</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($kayu as $ky)
            <tr>              
                <td>{{ $ky->kode_kayu }}</td>
                <td>{{ $ky->nama_kayu }}</td>
                <td>{{ $ky->s_kayu }}</td>
            </tr>
            @endforeach                     
          </tbody>
          <tfoot>
          <tr>
            <th>Kode Kayu</th>
            <th>Nama Kayu</th>
            <th>S</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection