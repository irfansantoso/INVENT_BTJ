@extends('template')
@section('content')

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
      
      <form class="form-horizontal" action="{{ route('unitAlat.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Kode Unit</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_unit_a" name="kode_unit_a" placeholder="Contoh 001" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Nomor Pintu</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nomor_pintu" name="nomor_pintu" placeholder="Nomor Pintu">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="merk_unit_a" name="merk_unit_a" placeholder="Merk Unit">
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
            <th>Kode Unit</th>
            <th>Nomor Pintu</th>
            <th>Merk</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($unitAlat as $unitAl)
            <tr>              
                <td>{{ $unitAl->kode_unit_a }}</td>
                <td>{{ $unitAl->nomor_pintu }}</td>
                <td>{{ $unitAl->merk_unit_a }}</td>
            </tr>
            @endforeach                     
          </tbody>
          <tfoot>
          <tr>
            <th>Kode Unit</th>
            <th>Nomor Pintu</th>
            <th>Merk</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection