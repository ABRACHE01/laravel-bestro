@extends('layouts.layoute')
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
         <form action="{{ route('home.update', $plate->id ) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
           <label>Name</label>u
           <input type="hidden" name="user_id"   value="{{ Auth::user()->id }}" class="form-control">
           <input type="text" name="name" id="name" value="{{$plate->name}}" class="form-control"></br>
           <label>price</label>
           <input type="text" name="price" id="price" value="{{$plate->price}}"  class="form-control"></br>
           <label>coption</label>
           <textarea type="text" name="coption" id="coption" class="form-control">{!! $plate->coption !!}</textarea></br>

           <div class="form-group">
            <label class="input-group" for="category_id">Options</label>
            <select class="form-select browser-default custom-select" id="category_id" name="category_id" >
                      {{ $selected=$plate->category_id }}
                <option disabled>categorie</option>
                <option value="1"<?php if ($selected == '1') echo 'selected' ; ?> >food</option>
                <option value="2"<?php if ($selected == '2') echo 'selected' ; ?> >drinks</option>
    
            </select>
            </div>

           <div class="form-group">

            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" ="{{$plate->image}}"   >
            
          </div>
          
           <input type="submit" value="update" class="btn btn-success"></br>
       </form>
      </div>
  </div>
</div>
@stop