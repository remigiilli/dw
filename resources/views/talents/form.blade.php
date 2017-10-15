@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ((isset($talent->id) && $talent->id))
    {{ Form::model($talent, array('method' => 'PUT', 'route' => array('talents.update', $talent->id))) }}
@else
    {{ Form::model($talent, array('method' => 'POST', 'route' => array('talents.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}</p>
    </div>
    <div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('talent-options', 'Options') }}
    {{ Form::select('options[]', $talent_options, $talent->options->lists('id')->all(), ['multiple' => 'multiple', 'id' => 'talent-options', 'class' => 'form-control']) }}
    </div>    
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
