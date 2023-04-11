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
      
      <form class="form-horizontal" action="{{ route('fixedAsset.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_fa" name="kode_fa" placeholder="Kode" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Nama Fixed Asset</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_fa" name="nama_fa" placeholder="Nama Fixed Asset">
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
            <th>Nama Fixed Asset</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($fixedAsset as $fa)
            <tr>              
                <td>{{ $fa->kode_fa }}</td>
                <td>{{ $fa->nama_fa }}</td>
            </tr>
            @endforeach                     
          </tbody>
        </table>
      </div>
      
      <!-- /.card-body -->
    </div>    
    <!-- /.card -->
@endsection