@extends('layouts.layoute')

@section('content')
<div class="containerv mt-5">
    <div class="d-flex justify-content-center">
        <div class="">
            <div class="card " style="width: 500px">
                <div class="card-header text-center ">{{ __('Reset Password') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can enter your Email here.</p>
                  
                   
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                       <div>
                        <button type="submit" class="btn btn-primary col-md-8 ">
                            {{ __('Send Password Reset Link to email') }}
                        </button> 
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
