@extends('template')
@section('content')

    <!-- Default box -->
    <br>
    @if(session('success'))
    <p class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>{{ session('success') }}</p>
    @endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">View Form</h3>        
      </div>
      <div class="card-footer text-right">
        <a href="{{ route('jnsAlat_tambah') }}" class="add btn btn-primary btn-sm">
          <span>
            <i class="fas fa-solid fa-plus"></i>
            <span>
              Tambah
            </span>
          </span>
        </a>
      </div>
      <!-- /.card-header -->    
    </div>
      <!-- /.card -->
    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="custom-content-above-jnsalat-tab" data-toggle="pill" href="#custom-content-above-jnsalat" role="tab" aria-controls="custom-content-above-jnsalat" aria-selected="true">Jenis Alat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="custom-content-above-merk-tab" data-toggle="pill" href="#custom-content-above-merk" role="tab" aria-controls="custom-content-above-merk" aria-selected="false">Merk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="custom-content-above-messages-tab" data-toggle="pill" href="#custom-content-above-messages" role="tab" aria-controls="custom-content-above-messages" aria-selected="false">Jenis Alat & Merk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="custom-content-above-messages2-tab" data-toggle="pill" href="#custom-content-above-messages2" role="tab" aria-controls="custom-content-above-messages2" aria-selected="false">Jenis Alat & Merk 2</a>
      </li>
    </ul>
    <div class="tab-content" id="custom-content-above-tabContent">
      <div class="tab-pane fade show active" id="custom-content-above-jnsalat" role="tabpanel" aria-labelledby="custom-content-above-jnsalat-tab">
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
      </div>
      <div class="tab-pane fade" id="custom-content-above-merk" role="tabpanel" aria-labelledby="custom-content-above-merk-tab">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Kode </th>
                <th>Nama Merk</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($merk as $mr)
                <tr>              
                    <td>{{ $mr->kode_merk }}</td>
                    <td>{{ $mr->nama_merk }}</td>
                </tr>
                @endforeach                     
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="tab-pane fade" id="custom-content-above-messages" role="tabpanel" aria-labelledby="custom-content-above-messages-tab">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example4" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Kode </th>
                <th>Keterangan</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($gabJnsAlatMerk as $gjam)
                <tr>              
                    <td>{{ $gjam->kode_jnsAlatMerk }}</td>
                    <td>{{ $gjam->keterangan }}</td>
                </tr>
                @endforeach                     
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="tab-pane fade" id="custom-content-above-messages2" role="tabpanel" aria-labelledby="custom-content-above-messages2-tab">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example5" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Kode </th>
                <th>Keterangan</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($gabJnsAlatMerk2 as $gjam)
                <tr>              
                    <td>{{ $gjam->kode_jnsAlatMerk }}</td>
                    <td>{{ $gjam->keterangan }}</td>
                </tr>
                @endforeach                     
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    
@endsection