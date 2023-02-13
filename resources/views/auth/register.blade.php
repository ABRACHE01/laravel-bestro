@extends('layouts.layoute')
@yield('styles')
@vite(['resources\views\auth\assets\css\login.css'])
@section('content')

<div  class="d-flex align-items-center min-vh-100 py-3 py-md-0">
  <div class="container ">
 
    <div class="card login-card">
      <div class="row no-gutters">
        <div class="col-md-5">
          <img src="staticpictures/pexels-atahan-demir-3633990.jpg" alt="login" class="login-card-img">
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <div class="brand-wrapper ">
              <h1> MA.Bistro </h1>
            </div>
            <p class="login-card-description"> Welcome to your fav morroccan bistro  </p>
            <form method="POST" action="{{ route('register') }}">
              @csrf
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('Name') }}" autofocus>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email Address') }}">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
  
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
            
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                      <input  type="hidden" value="2"  name="role_id" >

           
                      <button type="submit" class="btn btn-block login-btn mb-4">
                          {{ __('Register') }}
                      </button>
          </form>
              <p class="login-card-footer-text">Allready have an account? <a href="{{ route('login') }}" class="text-reset">signin here</a></p>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    
   
 


@endsection
