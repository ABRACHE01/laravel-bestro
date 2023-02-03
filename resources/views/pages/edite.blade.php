@extends('layouts.app')
@section('content')




<div class="container  justify-items-center ">


  <div class="card mt-4 ">

      <div class="card-body bg-light m-2">
          <div class="mb-3 text-center">
              <h4>EDITE Plate </h4>
          </div>
          <a href="{{ route('home.index') }}" class="btn btn-sm btn-primary mr-5 mb-5">
              <i class="fa fa-home"></i>
          </a>
         <form action="{{ route('home.update', $plate->id ) }}" method="POST">
          @csrf
          @method('PUT')
           <label>Name</label>
           <input type="text" name="name" id="name" value="{{$plate->name}}" class="form-control"></br>
           <label>price</label>
           <input type="text" name="price" id="price" value="{{$plate->price}}"  class="form-control"></br>
           <label>coption</label>
           <textarea type="text" name="coption" id="coption" class="form-control">{!! $plate->coption !!}</textarea></br>
         
           <input type="submit" value="update" class="btn btn-success"></br>
       </form>
      </div>
  </div>


</div>
@stop