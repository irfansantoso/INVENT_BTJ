@extends('app')
@section('content')
{{-- @auth
<p>Welcome <b>{{ Auth::user()->name }}</b></p>
<a class="btn btn-primary" href="{{ route('password') }}">Change Password</a>
<a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
@endauth --}}
{{-- @guest --}}

<!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h2">LOGIN | INVENT - BTJ</a>
        </div>
        <div class="card-body">
            @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            @if($errors->any())
            @foreach($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
            @endif
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{ route('login.action') }}" method="post">
            @csrf
                <div class="input-group mb-3">
                  <input class="form-control" type="username" name="username" value="{{ old('username') }}" placeholder="username" autofocus/>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input class="form-control" type="password" name="password" placeholder="password"/>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">

                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                  </div>
                  <!-- /.col -->
                </div>
            </form>            

        </div>
    <!-- /.card-body -->
    </div>
  <!-- /.card -->
{{-- @endguest --}}
@endsection