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

@if ((isset($talent_option->id) && $talent_option->id))
    {{ Form::model($talent_option, array('method' => 'PUT', 'route' => array('talentoptions.update', $talent_option->id))) }}
@else
    {{ Form::model($talent_option, array('method' => 'POST', 'route' => array('talentoptions.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
