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
      
      <form class="form-horizontal" action="{{ route('keperluan.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="kode_keperluan" name="kode_keperluan" placeholder="Kode Keperluan" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label for="Keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="kep_keterangan" name="kep_keterangan" placeholder="Keterangan">
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
            <th>Kode Keperluan</th>
            <th>Keterangan</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($keperluan as $kep)
            <tr>              
                <td>{{ $kep->kode_keperluan }}</td>
                <td>{{ $kep->kep_keterangan }}</td>
            </tr>
            @endforeach                     
          </tbody>
          <tfoot>
          <tr>
            <th>Kode Keperluan</th>
            <th>Keterangan</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection