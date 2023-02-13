
@extends('layouts.layoute')
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
			<div class="p-5">
              <div class="d-flex justify-content-center mb-4">
               <img   src="{{ Auth::user()->image ? asset('images/'.Auth::user()->image) : asset('staticpictures/user.png') }}" class="rounded-circle mt-5" alt="example placeholder" style="width: 200px;"  alt="Profile Image">
              </div>
              <span class="font-weight-bold">{{Auth::user()->name}} : </span><span class="text-black-50"> {{Auth::user()->email}} </span>
          </div>
			</div>
			<a href="{{route('plates')}}">MENU</a>
			<a href="{{route('home.create')}}">ADD NEW DISH</a>
			<a href="{{route('settings',Auth::user()->id)}}">PROFILE SETTINGS</a>
			<a href="{{ route('logout' ) }}"
			onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				@csrf
			</form>
		</nav>
<div class="mt-5" id="Dashcontent">

	<ul class="breadcrumb p-4 h6 d-flex justify-content-between align-items-center ">
		<div class="breadcrumb  ">
		<li class="breadcrumb-item  "><a class="text-decoration-none text-dark" href="{{ route('plates') }}">plates</a></li>
		<li class="breadcrumb-item active">Dashboard</li>
		</div>

		<h1>
			3end Mohamed <span class="h5 "> full of flaivors </span> 
		</h1>
		
				
			  
		<div class="d-flex">
		<li class="h6 ">
			<a href="{{route('settings',Auth::user()->id)}}"><img src="{{ Auth::user()->image ? asset('images/'.Auth::user()->image) : asset('staticpictures/user.png') }}" class="rounded-circle" height="50" alt="Avatar" loading="lazy" /></a>
		<span class="text-dark">{{ Auth::user()->name }}</span>  </li>
		</div>
	</ul>

	<h1 class="Weclome ps-3 p-5 ">Weclome back<span class="text-white "> {{ Auth::user()->name }}

			</span> !! </h1>

	<h3 class=" ps-3 p-3 text-decoration-underline">Statistics</h3>


	<section>

		<div class="part2 text-center  " >

			<section  class="carts container-fluid  justify-content-center   ">
				<h3 class><span class="h1">{{ $adminsCount }}</span> Totale registred<span>👤</h3>
			</section>

			<section class="carts container-fluid  justify-content-center ">
				<h3></span><span class="h1">{{ $platesCount}}</span> Totale Plates<span>🥘</h3>
			</section>

			<section class="carts container-fluid  justify-content-center ">
				<h3></span><span class="h1">{{ $clients}}</span> clients <span>👤</h3>
			</section>
			<section class="carts container-fluid  justify-content-center ">
				<h3></span><span class="h1">{{ $admins}}</span> admins <span>👤</h3>
			</section>
		</div>		
</div>


<div class="container mt-3">
<h3 class=" ps-3 p-5 text-decoration-underline ">YOUR POSTES PLATES </h3>
@if($message= Session::get('primary')) 
<div id="" class="alert alert-primary" role="alert">
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
		<div class=" card bg-info ">
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
					<p class="h6 ">	
						<img src="{{ Auth::user()->image ? asset('images/'.Auth::user()->image) : asset('staticpictures/user.png') }}" class="rounded-circle" height="30" alt="Avatar" loading="lazy" />
						<span class="text-dark"> {{ Auth::user()->name }} </span>
					 </p>
					</div>
				</div>
				<div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar table-striped ">
				<table id="myTable" class="table table-striped table-borderless mb-0 scroll ">
                    <thead>
                        @php
                        $i=0;
                    @endphp
							<tr>
                                <th scope="col" class="h5 ">#</th>
								<th scope="col" class="h5 ">photo</th>
								<th scope="col" class="h5 ">name</th>
								<th scope="col" class="h5 ">coption</th>
								<th scope="col" class="h5 ">Admin</th>
								<th scope="col" class="h5 ">category</th>
								<th scope="col" class="h5 ">created</th> 
								<th scope="col" class="h5 ">updated</th>     
                                <th scope="col" class="h5 ">price</th>              
								<th scope="col" class="h5 ">action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($plate as $item)
								<tr>
									
									<td class="h5">{{ ++$i }}</td>
									<td class="h5"><img  class="rounded" src="{{ asset('images/' . $item->image) }}"   width="50px" alt="{{ $item->image }}"></td>
                                    <td>{{ $item->name }}</td>
									<td class="text appadd " >{{ $item->coption }}</td>
									<td>{{ $item->user->name}}</td>
									<td>
										
											<span class="badge badge-primary p-2 ">{{ $item->category->category_name}}</span> 
										
										
									</td>
									<td class="text-info">{{ $item->created_at->diffForhumans() }}</td>
									<td class="text-success">{{ $item->updated_at->diffForhumans() }}</td>
									<td>{{ $item->price }} dh</td>
									<td>
										<div class="d-flex justify-content-center">
											<button class="btn btn-sm btn-success "> <a href="{{ route('home.edit',$item->id) }}"><i class="fa fa-edit"></i></a></button>
											<button class="btn btn-sm btn-warning"><a href="{{ route('home.show',$item->id) }}"><i class="fa fa-eye "></i></a></button> 
												   <form action="{{route('home.destroy', $item->id)}}" method="POST">
													  @csrf                         
													  @method('DELETE')
													  <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
												   </form>
										</div>
									</td>
								</tr>
                                @endforeach	
						</tbody>
					</table>
					<div class="d-flex justify-content-center">
						{{ $plate->links() }}
					</div>
				</div>
				<h3 class=" card-footer p-2"> Your PLATES:{{$i}}<span> </span></h3>
			</div>
		</div>

		{{-- <div class=" card bg-info mt-5 ">
			<div class="card-body bg-light ">
				<div class=" card-header d-flex justify-content-between ">
					<div>
					<p class="h6 ">	
						<img src="{{ Auth::user()->image ? asset('images/'.Auth::user()->image) : asset('staticpictures/user.png') }}" class="rounded-circle" height="30" alt="Avatar" loading="lazy" />
						<span class="text-dark"> {{ Auth::user()->name }} </span>
					 </p>
					</div>
				</div>
				<div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar table-striped ">
				<table id="myTable" class="table table-striped table-borderless mb-0 scroll ">
                    <thead>
                        @php
                        $i=0;
                    @endphp
							<tr>
                                <th scope="col" class="h5 ">#</th>
								<th scope="col" class="h5 ">photo</th>
								<th scope="col" class="h5 ">name</th>
								<th scope="col" class="h5 ">email</th>
								<th scope="col" class="h5 ">created</th>  
								          
								<th scope="col" class="h5 ">action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
								<tr>
									
									<td class="h5">{{ ++$i }}</td>
									<td class="h5">
										<img  class="rounded" src="{{ asset('images/' .$user->image) }}"   width="50px" >
										<img src="{{ Auth::user()->image ? asset('images/'.$user->image) : asset('staticpictures/user.png') }}" class="rounded-circle" height="30" alt="Avatar" loading="lazy" />
									</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td class="text appadd " >{{ $user->created_at }}</td>
									
									<td>
										<div class="d-flex justify-content-center">
								
												   <form action="{{route('home.destroy', $item->id)}}" method="POST">
													  @csrf                         
													  @method('DELETE')
													  <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
												   </form>
										</div>
									</td>
								</tr>
								@endforeach 
						</tbody>
					</table>
				</div>
				<h3 class=" card-footer p-2"> Your PLATES:{{$i}}<span> </span></h3>
			</div>
		</div>
		
</div> --}}



	

<footer><div class="text-center p-5"> MADE with 💖 by <span class="text-light" > Mohamed ABRACHE </span></div></footer>

@endsection
