@extends('layouts.master')
@section('header')
  <a href="{{url('/')}}">Back to over view</a>
  <h2>{{$cat->name}}</h2>
@stop
@section('content')
  <p>Date of birth:  {{ $cat->date_of_bith }}</p>
  <p>
    @if ($cat->breed)
      <a href="{{url('/cats/breeds/') . '/' . $cat->breed->name}} ">{{$cat->breed->name}}</a>
    @endif
  </p>
@stop
