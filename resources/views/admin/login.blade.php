@extends('admin.layout.AdminLayout')
@section('guestContents')
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <div>
                <img class="img-fluid" src="{{ asset('images/alyusr-logo.png') }}" alt="Alyusr Logo">
                <h6 class="card-title fs-4 text-center">Sign in</h6>
            </div>
            @if (session('success'))
            <div id="notif" class="row">
                <div class="col-12">
                    <div class="alert alert-success contact__msg" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('signin') }}" method="post">
                @csrf
              <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Remember password
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-info btn-login text-uppercase fw-bold" type="submit">Login
                  </button>
              </div>
              <hr class="my-4">
            </form>
            {{-- <a href="{{ route('signup') }}">Create Account</a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
