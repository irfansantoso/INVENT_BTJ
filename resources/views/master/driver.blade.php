@extends('template')
@section('content')

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
      
      <form class="form-horizontal" action="{{ route('driver.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_driver" name="kode_driver" placeholder="Contoh 014" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Nama Driver</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_driver" name="nama_driver" placeholder="Nama Driver">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Kode Alat</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_alat_d" name="kode_alat_d" placeholder="Kode Alat">
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
            <th>Kode Driver</th>
            <th>Nama Driver</th>
            <th>Kode Alat</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($driver as $drvr)
            <tr>              
                <td>{{ $drvr->kode_driver }}</td>
                <td>{{ $drvr->nama_driver }}</td>
                <td>{{ $drvr->kode_alat_d }}</td>
            </tr>
            @endforeach                     
          </tbody>
          <tfoot>
          <tr>
            <th>Kode Driver</th>
            <th>Nama Driver</th>
            <th>Kode Alat</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection