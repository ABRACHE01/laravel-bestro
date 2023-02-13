@extends('layouts.layoute')
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
              <form action="{{ route('home.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id"   value="{{ Auth::user()->id }}" class="form-control">
                 <label>Name</label>
                 <input type="text" name="name" id="name" class="form-control"></br>
                 @if ($errors->has('name'))
                 <small class="form-text text-danger">{{ $errors->first('name') }}</small>
             @endif
                 <label>price</label></br>
                 <input type="text" name="price" id="price" class="form-control"></br>
                 @if ($errors->has('price'))
                 <small class="form-text text-danger">{{ $errors->first('price') }}</small>
             @endif
                 <label>coption</label></br>
                 <textarea type="text" name="coption" id="coption" class="form-control"></textarea></br>
                 <div class="form-group">
                    @if ($errors->has('coption'))
                    <small class="form-text text-danger">{{ $errors->first('coption') }}</small>
                @endif
                    <label class="input-group" for="category_id">Options</label>
                    <select class="form-select browser-default custom-select" id="category_id" name="category_id" >
                        <option disabled selected>categorie</option>
                        <option value="1">food</option>
                        <option value="2">drink</option>
                    </select>
                </div>
                @if ($errors->has('category_id'))
                <small class="form-text text-danger">{{ $errors->first('category_id') }}</small>
            @endif

                 <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="customFile2" name="image"   >
                    <img id="preview" class="rounded mt-2" width="100" height="auto"  >

                  @if ($errors->has('image'))
                      <small class="form-text text-danger">{{ $errors->first('image') }}</small>
                  @endif

                  </div>

                 <input type="submit" value="Save" class="btn btn-success"></br>
               
             </form>
          </div>
      </div>


</div>
<script>
    const fileInput = document.querySelector('#customFile2');
const preview = document.querySelector('#preview');

fileInput.addEventListener('change', function () {
  const file = this.files[0];

  if (!file.type.startsWith('image/')) {
    alert('Please select an image file');
    return;
  }

  const reader = new FileReader();

  reader.addEventListener('load', function () {
    preview.src = reader.result;
  });

  reader.readAsDataURL(file);
});
  </script>
@stop