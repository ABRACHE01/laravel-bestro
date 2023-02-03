
@extends('layouts.app')
@section('styles')
@vite(['resources/css/appdash.css'])
@endsection


@section('content')
<div class="custom-shape-divider-top-1673963219">
    <svg  data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
    </svg>
</div>

		<input type="checkbox" id="navcheck" role="button" title="menu">
		<label for="navcheck" aria-hidden="true" title="menu">
			<span class="burger">
				<span class="bar">
					<span class="visuallyhidden">Menu</span>
				</span>
			</span>
		</label>
		<nav id="menu">
			<a href="">HOME</a>
			<a href="">DASHBOARD</a>
			<a href="">ADD NEW PLATES</a>
			<a href="">LOGOUT</a>
			
			
            
		</nav>

<div class="mt-5" id="Dashcontent">

	<ul class="breadcrumb p-4 h6 d-flex justify-content-between align-items-center ">
		<div class="breadcrumb  ">
		<li class="breadcrumb-item  "><a class="text-decoration-none text-dark" href="{{ route('plates') }}">plates</a></li>
		<li class="breadcrumb-item active">Dashboard</li>
		</div>

		<h1>
			Mahlaba <span class="h5 text-secondary"> full of flaivers </span> 
		</h1>
		
		<div class="d-flex">
		<li class="h6 text-secondary"><span class="text-dark">ADMIN :{{ Auth::user()->name }}</span>  </li>
		</div>
	</ul>

	<h1 class="Weclome ps-3 p-5 text-secondary">Weclome back<span class="text-white "> {{ Auth::user()->name }}

			</span> !! </h1>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>
            
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                {{ __('You are logged in!') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

	<h3 class=" ps-3 p-3 text-decoration-underline ">Statistics</h3>


	<section>

		<div class="part2 text-center text-secondary " >

			<section  class="carts container-fluid  justify-content-center   ">
				<h3 class><span class="h1">{{ $adminsCount }}</span> Admins<span>👤</h3>
			</section>

			<section class="carts container-fluid  justify-content-center ">
				<h3></span><span class="h1">{{ $platesCount}}</span> Totale Plates<span>🥘</h3>
			</section>

			<section class="carts container-fluid  justify-content-center ">
				<h3></span><span class="h1"> </span> Categiries<span>😋</h3>
			</section>

		</div>

		
</div>


<div class="container mt-3">
<h3 class=" ps-3 p-5 text-decoration-underline ">YOUR POSTES PLATES  </h3>
@if($message= Session::get('primary')) 
<div class="alert alert-primary" role="alert">
    {{$message}}
   </div>
@endif
@if($message= Session::get('danger')) 
<div class="alert alert-danger" role="alert">
    {{$message}}
   </div>
@endif
@if($message= Session::get('success')) 
<div class="alert alert-success" role="alert">
    {{$message}}
   </div>
@endif
	<div class="row">
		<div class="card bg-info">
			<div class="card-body bg-light ">
				<div class=" card-header d-flex justify-content-between ">
					<div>
						<a href="{{ route('home.create') }}" class="btn btn-sm btn-info mr-2 mb-2">
							<i class="fa fa-plus "></i>
						</a>
						<a href="{{ route('plates') }}" class="btn btn-sm btn-info mr-2 mb-2">
							<i class="fa fa-home"></i>
						</a>

					</div>
					<div>
					<p class="h6 text-secondary"><span class="text-dark">ADMIN : {{ Auth::user()->name }} </span> </p>
					</div>
				</div>
				<div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
				<table id="myTable" class="table table-striped table-borderless mb-0 scroll">
                    <thead>
                        @php
                        $i=0;
                    @endphp
							<tr>
                                <th scope="col" class="h5 ">#</th>
								<th scope="col" class="h5 ">photo</th>
								<th scope="col" class="h5 ">name</th>
								<th scope="col" class="h5 ">coption</th>
                                <th scope="col" class="h5 ">price</th>                        
								<th scope="col" class="h5 ">action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($plate as $item)
								<tr>
									
									<td class="h5">{{ ++$i }}</td>
									<td class="h5"><img src="{{ asset($item->photo) }}" alt="{{ $item->name }}"></td>
                                    <td>{{ $item->name }}</td>
									<td class="text">{{ $item->coption }}</td>
									<td>{{ $item->price }}</td>
								
					
									<td class="d-flex justify-content-center">
                                  <button class="btn btn-sm btn-warning"> <a href="{{ route('home.edit',$item->id) }}"><i class="fa fa-edit"></i></a></button>
                                  <button class="btn btn-sm btn-warning"><a href="{{ route('home.show',$item->id) }}"><i class="fa fa-eye "></i></a></button> 
                                         <form action="{{route('home.destroy', $item->id)}}" method="POST">
                                            @csrf                         
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                         </form>
									</td>
								</tr>
                                @endforeach	
						</tbody>
					</table>
				</div>
				<h3 class=" card-footer p-2"> Your PLATES:{{$i}}<span> </span></h3>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">...</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<footer><div class="text-center p-5"> MADE with 💖 by <span class="text-secondary" > Mohamed ABRACHE </span></div></footer>

@endsection
