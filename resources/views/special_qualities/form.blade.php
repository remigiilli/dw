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

@if ((isset($special_quality->id) && $special_quality->id))
    {{ Form::model($special_quality, array('method' => 'PUT', 'route' => array('specialqualities.update', $special_quality->id))) }}
@else
    {{ Form::model($special_quality, array('method' => 'POST', 'route' => array('specialqualities.store'))) }}
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
    {{ Form::label('extra', 'Additional Value') }}
    {{ Form::select('extra', $extra, $special_quality->extra, ['class' => 'form-control']) }}
    </div>        
    <button type="submit" class="btn btn-primary">Submit</button>    
{{ Form::close() }}
@endsection 
