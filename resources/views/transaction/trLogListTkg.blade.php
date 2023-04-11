@extends('template')
@section('content')
<!-- Content Header (Page header) -->

    <!-- Default box -->
    <br>    
    <form action="{{ route('trLoglistModal.edit') }}" method="post">
    {{ csrf_field() }}

    <div class="card-footer">
      <input type="hidden" name="nolog_id" value="{{Session::get('nologlist')}}">
      <a href="{{ route('trTongkang') }}" class="btn btn-success btn-sm">Back</a>

      @if(Session::get('nologlist') != null)
        @if(App\Http\Controllers\UserController::getClosedTkg(Session::get('nologlist')) == "closed")
        <span style="color:blue;">Already Closed</span>
        @else
        <button type="submit" class="btn btn-danger btn-sm">Closed</button>
        @endif
      @else
        <span style="color:blue;">Waktu session expired, coba logout dan login ulang!!</span>
      @endif
    </div>

    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="trLoglistModal" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No Loglist</th>
            <th>Thn Prod</th>
            <th>Thn RKT</th>
            <th>Jns Kayu</th>
            <th>Petak</th>
            <th>No Btg</th>
            <th>Panjang</th>
            <th>Ujung</th>
            <th>Pangkal</th>
            <th>Rata2</th>
            <th>Vol</th>
            <th>Cct</th>
            <th>Pcct</th>
          </tr>
          </thead>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    
    
@endsection