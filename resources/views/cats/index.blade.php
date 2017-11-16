@extends('layouts.master')
@section('header')
  @if (isset($breed))
    <a href="{{url('/')}}"> Back to over view </a>
  @endif
  <h2> All @if(isset($breed)) {{$breed->name}} @endif Cats </h2>
@stop
@section('content')
  @foreach($cats as  $cat)
    <div class="cat">
      <a href="{{url('cats/' . $cat->id)}}">{{$cat->name}} - {{$cat->breed->name}}</a>
    </div>
  @endforeach
@stop