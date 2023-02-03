@extends('layouts.layoute')

@section('title', 'Plates')

@section('styles')
  <!-- Your custom styles here -->
@endsection

@section('content')
  <!-- Your HTML content here -->
  

    <div class="title">
        <h1 class="text-center text-white logo">BISTRO</h1>
    </div>

    <div class="text-center">
        <h2 class="form-title text-info h1 ">Find what you're <strong> Curious</strong> about</h2>
        <h4 class="text-white pt-1">Search for plates and drinks </h4>
         </div>
    <div class="ms-5 me-5 d-flex justify-content-center ">
      
       
    
    <section class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
       

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
        </div>
    </section> 


    </div>
    @php
    $i=0;
@endphp
@foreach($plate as $item)
        <div class="content">
            <div class="cardarticle first mt-5 ">
                <div class="mb-4">
                    <h1 class="text-center mb-4">⭐{{$item->name}} ⭐</h1>
                    <img class="center" src="images/pexels-atahan-demir-3633990.jpg" height="100%" width="100%">
                </div>
                <div>
                   
                    <p><strong>Admin : </strong> </p>
                    <p class="date"><strong>Date : </strong>{{$item->name}} </p>
                    <strong>coption</strong>
                    <p class="text">" {{$item->coption }}  "</p>
                    <p><strong>Price : {{$item->price }} DH </p>
                </div>
            </div>
        </div>
        @endforeach	
<footer><div class="text-center p-5"> MADE with 💖 by <span class="text-white " > Mohamed ABRACHE </span></div></footer>

  
@endsection
</div>
@section('scripts')
  <!-- Your JavaScript here -->
@endsection
 
</html>
