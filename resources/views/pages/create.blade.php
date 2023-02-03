@extends('layouts.app')
@section('content')



<div class="container  justify-items-center ">


      <div class="card mt-4 ">

          <div class="card-body bg-light m-2">
              <div class="mb-3 text-center">
                  <h4>ADD Plate </h4>
              </div>
              <a href="{{ route('home.index') }}" class="btn btn-sm btn-primary mr-5 mb-5">
                  <i class="fa fa-home"></i>
              </a>
              <form action="{{ route('home.store') }}" method="post">
                @csrf
                 <label>Name</label>
                 <input type="text" name="name" id="name" class="form-control"></br>
                 <label>price</label></br>
                 <input type="text" name="price" id="price" class="form-control"></br>
                 <label>coption</label></br>
                 <textarea type="text" name="coption" id="coption" class="form-control"></textarea></br>
               
            
                 <input type="submit" value="Save" class="btn btn-success"></br>
               
             </form>
          </div>
      </div>


</div>

@stop