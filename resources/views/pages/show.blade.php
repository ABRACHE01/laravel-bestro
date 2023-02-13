@extends('layouts.layoute')
@section('content')


  <div class="card mx-auto m-5 " style="width: 50%;" >

  <a href="{{ route('home.index') }}" class="btn btn-info">back</a>
  <h2 class="card-header text-center">PLATE PAGE</h2>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Name : {{ $plate->name }}</h5>
        <p class="date bold text-info">Created : {{$plate->created_at->diffForhumans()}} </p>
        <p class="date bold text-success">updated: {{$plate->updated_at->diffForhumans()}} </p>
        <p class="card-text">coption : {{ $plate->coption}}</p>
        <p class="card-text">admin : {{ $plate->user->name}}</p>
        <h1 class="card-title ">price : {{ $plate->price }}DH</h1>
        <img class="rounded center" src="{{ asset('images/' . $plate->image) }}" height="100%" width="100%">
  </div>
  </div>
 </div>
  

