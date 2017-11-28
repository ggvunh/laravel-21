@extends('layouts.master')
@section('header')
  <a href="{{url('/')}}">Back to over view</a>
  <h2>{{$cat->name}}</h2>
  <p>Last edited: {{ $cat->updated_at->diffForHumans() }}</p>
  @if (Auth::check() && Auth::user()->canEdit($cat))
  <a href="{{url('cats/' . $cat->id . '/edit')}}">Edit</a>
  @endif
  @if (Auth::check() && Auth::user()->isAdmin())
  <a href="{{url('cats/' . $cat->id . '/delete')}}">Delete</a>
  @endif
@stop
@section('content')
  <p>Date of birth:  {{ $cat->date_of_birth }}</p>
  <p>
    @if ($cat->breed)
      <a href="{{url('/cats/breeds/') . '/' . $cat->breed->name}} ">{{$cat->breed->name}}</a>
    @endif
  </p>
@stop
