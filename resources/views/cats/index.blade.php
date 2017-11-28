@extends('layouts.master')
@section('header')
  @if (isset($breed))
    <a href="{{url('/')}}"> Back to over view </a>
  @endif
  <h2> All @if(isset($breed)) {{$breed->name}} @endif Cats </h2>
  @if ( Auth::check() )
  <a href="{{url('cats/create')}}" class="btn btn-primary">Add new cat</a>
  @endif
@stop
@section('content')
  @foreach($cats as  $cat)
    <div class="cat">
      <a href="{{url('cats/' . $cat->id)}}">{{$cat->name}} - @if($cat->breed) {{$cat->breed->name}} @endif</a>
    </div>
  @endforeach
@stop
