@extends('layouts.main')

@section('container')
@if(session()->has('loginError'))
    <div class="alert alert-danger   alert-dismissible fade show" role="alert">
      {{session('loginError')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  
<main class="form-signin w-100 m-auto">
  <form action="/auth/login" method="POST">
    @csrf
    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

   
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">📧</span>
        <input name="email" type="email" class="form-control" placeholder="Email address" aria-label="Email address" aria-describedby="basic-addon1">
      </div>
      
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">🔒</span>
        <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
      </div>
      
    
    {{-- <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control mt-2" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div> --}}

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <a class="nav-link mt-5" href="/auth/register">Register</a>
  </form>
</main>
@endsection
