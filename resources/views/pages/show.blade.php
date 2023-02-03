@extends('layouts.layoute')
@section('content')


  <div class="card mx-auto m-5 " style="width: 50%;" >

  <a href="{{ route('home.index') }}" class="btn btn-info">back</a>
  <h2 class="card-header text-center">PLATE PAGE</h2>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Name : {{ $plate->name }}</h5>
        <p class="card-text">price : {{ $plate->price }}</p>
        <p class="card-text">coption : {{ $plate->coption }}</p>

  </div>
  </div>
 </div>
  

