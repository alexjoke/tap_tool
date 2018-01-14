@extends('app')

@section('content')
    <div class="row head">
        <a class="left" href="{{route('home')}}">&#8592; Home </a>
    </div>
    <div class="@if($checkAttr == 1) check @endif">
        <h3 style="@if($checkAttr == 0)display: none @endif; text-align: center;">You will be redirect in <span id="timer"></span> sec...</h3>
        <h2 class="red">Sorry, this click has been already tracked &#10006;</h2>
    </div>
@endsection
