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
      
      <form class="form-horizontal" action="{{ route('aktivitasAlat.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_akv" name="kode_akv" placeholder="Kode" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Aktivitas Alat</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_akv" name="nama_akv" placeholder="Nama Fixed Asset">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Cat</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="cat_akv" name="cat_akv" placeholder="" value="D">
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

        <table id="example3" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kode </th>
            <th>Aktivitas Alat</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($aktivitasAlat as $akv)
            <tr>              
                <td>{{ $akv->kode_akv }}</td>
                <td>{{ $akv->nama_akv }}</td>
            </tr>
            @endforeach                     
          </tbody>
        </table>
      </div>
      
      <!-- /.card-body -->
    </div>    
    <!-- /.card -->
@endsection