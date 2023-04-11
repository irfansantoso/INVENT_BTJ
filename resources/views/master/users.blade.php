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
      
      <form class="form-horizontal" action="{{ route('users.add') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="name" name="name" placeholder="Nama" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Username <span class="text-danger">*</span></label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
            <div class="col-sm-6">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password Confirmation <span class="text-danger">*</span></label>
            <div class="col-sm-6">
              <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Password Confirmation">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Level <span class="text-danger">*</span></label>
            <select class="form-control" name="level" id="level" style="width: 20%;">
              <option selected="selected">-- Level --</option>
                <option value="administrator">Administrator</option>
                <option value="user">User</option>
            </select>
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
            <th>Nama User</th>
            <th>Username</th>
            <th>Level</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($user as $usr)
            <tr>
                <td>{{ $usr->name }}</td>
                <td>{{ $usr->username }}</td>
                <td>{{ $usr->level }}</td>
            </tr>
            @endforeach                     
          </tbody>
          <tfoot>
          <tr>
            <th>Nama User</th>
            <th>Username</th>
            <th>Level</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection