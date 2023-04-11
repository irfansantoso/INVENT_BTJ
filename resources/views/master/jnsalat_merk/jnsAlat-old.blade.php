@extends('template')
@section('content')

    <!-- Default box -->
    <br>
    @if(session('success'))
    <p class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('success') }}</p>
    @endif
    <div class="card card">
      <div class="card-header">
        <h3 class="card-title">Add Form</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      
      <form class="form-horizontal" action="{{ route('jnsAlat.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_jnsAlat" name="kode_jnsAlat" placeholder="Kode" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Nama Jenis Alat</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_jnsAlat" name="nama_jnsAlat" placeholder="Nama Jenis Alat">
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
            <th>Kode </th>
            <th>Nama Jenis Alat</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($jnsAlat as $ja)
            <tr>              
                <td>{{ $ja->kode_jnsAlat }}</td>
                <td>{{ $ja->nama_jnsAlat }}</td>
            </tr>
            @endforeach                     
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection