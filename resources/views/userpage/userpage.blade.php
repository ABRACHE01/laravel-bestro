@extends('layouts.layoute')

@section('title', 'Plates')

@section('styles')
  <!-- Your custom styles here -->
@endsection

@section('content')
  <!-- Your HTML content here -->
  
  <div class="custom-shape-divider-top-1673963219">
    <svg  data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
    </svg>
</div>

<div style="position: relative">
    <div class="title">
        <h1 class="text-center text-white logo">BISTRO</h1>
    </div>

    <div class="text-center">
        <h2 class="form-title text-light h1 ">Find what you're <strong> Curious</strong> about</h2>
        <h4 class="text-white pt-1">Search for plates and drinks </h4>
         </div>
</div>
  
    <div class="ms-5 me-5 d-flex justify-content-center ">
      
       
    
    <section class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
       

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
            

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    
                        @if (Route::has('login'))
                            <li class="btn btn-info  nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                     
                    @else
                    
                        <li class="nav-item dropdown">
                            <div class="container">
                                <a href="{{route('settings',Auth::user()->id)}}"><img src="{{ Auth::user()->image ? asset('images/'.Auth::user()->image) : asset('staticpictures/user.png') }}" class="rounded-circle" height="50" alt="Avatar" loading="lazy" /></a>
                                <div>
                                    <div class=" d-flex  justify-content-center">
                                      
                                    </div>
                                </div>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ redirect()->route('login') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <button class="btn btn-info " ><a class="text-white" href="{{route('settings',Auth::user()->id)}}">PROFILE SETTINGS</a></button>
                    @endguest
                </ul>
            </div>
       
    </section> 


    </div>
        @php
        $i=0;
    @endphp
@foreach($plate as $item)
        <div class="content">
            <div class="cardarticle first mt-5 d-flex justify-content-between ">
                <div>
                    <h1 class="mb-4 text-center ">⭐{{$item->name}} ⭐</h1>
                    <p class="date bold text-info">Created : {{$item->created_at->diffForhumans()}} </p>
                    <p class="date bold text-success">updated: {{$item->updated_at->diffForhumans()}} </p>
                    <strong>coption</strong>
                    <p class="text">" {{$item->coption }} "</p>
                      <p><i class="far fa-user"></i>admine: {{$item->user->name }}</p>
                    <h3>Price :  <span class>{{$item->price }}</span>  DH </h3>
                </div>
                <div class=" img-fluid  zoom  " >
                    <img  src="{{ asset('images/' . $item->image) }}"  width="250" height="250">
                </div>
            </div>
        </div>
        @endforeach	     
<footer>
  <div class="text-center p-5"> MADE with 💖 by <span class="text-white " > Mohamed ABRACHE </span></div>

</footer>

  
@endsection
</div>
@section('scripts')
  <!-- Your JavaScript here -->
@endsection
 
</html>
