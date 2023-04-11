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
      
      <form class="form-horizontal" action="{{ route('helper.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="account" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_helper" name="kode_helper" placeholder="Kode Helper" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="Nama Chainsaw" class="col-sm-2 col-form-label">Nama Helper</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nama_helper" name="nama_helper" placeholder="Nama Helper">
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
            <th>Kode Helper</th>
            <th>Nama Helper</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($helper as $hlp)
            <tr>              
                <td>{{ $hlp->kode_chainsaw }}</td>
                <td>{{ $hlp->nama_chainsaw }}</td>
            </tr>
            @endforeach                     
          </tbody>
          <tfoot>
          <tr>
            <th>Kode Helper</th>
            <th>Nama Helper</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection