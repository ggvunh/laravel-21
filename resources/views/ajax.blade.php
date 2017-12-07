@extends('layouts.master')
@section('header')
  <h1>Demo Ajax</h1>
@stop

@section('content')
    <div class="form-group">
      {!! Form::label('name', 'Name') !!}
    <div class="form-controls">
      {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>
    </div>
    <button id="btn-add" class="btn btn-success">Save Category</button>
    </br>
    <ul>
    </ul>

    <script>

        $('#btn-add').click(function(){

            var nameCategory = $('#name').val();
            // console.log(nameCategory);
            $.post('{{url('/categories')}}', {
                'name': nameCategory
            }, function(data, status){
                // console.log(data);
                $('ul').append('<li>' + data.name + '</li>')
            })
        });

       $.get('{{url('/categories')}}', function(data, status){
            console.log(data);
            data.forEach(function(category){
                $('ul').append('<li>' + category.name + '</ul>')
            });
       });
    </script>
@stop
