@if (!isset($cat))
<div class="form-group">
  {!! Form::label('name', 'Name') !!}
  <div class="form-controls">
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
  </div>
  @if ( $errors->has('name') )
    <span class="text-danger">
        <strong> {{ $errors->first('name') }}</strong>
    </span>
  @endif
</div>
@endif

<div class="form-group">
  {!! Form::label('date_of_birth', 'Date of Birth') !!}
  <div class="form-controls">
    {!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
  </div>
  @if ($errors->has('date_of_birth'))
    <span class="text-danger">
      <strong>{{ $errors->first('date_of_birth') }}</strong>
    </span>
  @endif
</div>

<div class="form-group">
  {!! Form::label('breed_id', 'Breed') !!}
  <div class="form-controls">
    {!! Form::select('breed_id', $breeds, null, ['class' => 'form-control']) !!}
  </div>
</div>

{!! Form::submit('Save Cat', ['class' => 'btn btn-primary']) !!}
