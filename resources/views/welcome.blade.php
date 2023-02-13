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
                                <a class=" text-white" href="{{ route('login') }}">LOGIN</a>
                            </li>
                        @endif
                        
                        @if (Route::has('register'))
                            <li class="btn btn-info  ">
                                <a class=" text-white" href="{{ route('register') }}">REGISTER</a>
                            </li>
                        @endif
                    
                    @else
                        <li class="nav-item dropdown">
                            <div class="container">
                                <div>
                                    <div class=" d-flex  justify-content-center">
                                        <a href="{{route('home.index')}}" class=" btn btn-info  mr-2   ">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </div>
                                </div>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
       
    </section> 
    </div>
   
        <div class="container p-0"  style="position: relative">
            <div class="text-center m-5" >
              <h1>⭐the real Morrocan food that no one ever told you about ⭐ </h1>
            </div>
           
              <div class="card-columns">
                @foreach($plate as $item)
                <div class="card ">
                  <a href="{{ route('home.show',$item->id) }}">
                  <img class="card-img-top" width="auto" height="auto" src="{{ asset('images/' . $item->image) }}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">⭐{{$item->name}} ⭐</h5>
                    <p class="card-text">
                        {{$item->coption }} 
                    </p>
                    <h5>Price : {{$item->price }} DH </h5>
                    <p class="">
                        <small class="text-muted "><i class="far fa-user"></i> <span class="m-1">{{$item->user->name }}</span></small>
                        <small class="text-muted"><i class="fas fa-calendar-alt "></i><span class="m-1">{{$item->created_at->diffForhumans()}}</span></small>
                    </p> 
                </div>
                  </a>
                </div>
                @endforeach
             
            </div>
        </div> 
<footer>
  <div class="text-center p-5"> MADE with 💖 by <span class="text-white " > Mohamed ABRACHE </span></div>

</footer>

  
@endsection
</div>
@section('scripts')
  <!-- Your JavaScript here -->
@endsection
 
</html>
