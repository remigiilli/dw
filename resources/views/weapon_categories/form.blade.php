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

@if ((isset($weapon_category->id) && $weapon_category->id))
    {{ Form::model($weapon_category, array('method' => 'PUT', 'route' => array('weaponcategories.update', $weapon_category->id))) }}
@else
    {{ Form::model($weapon_category, array('method' => 'POST', 'route' => array('weaponcategories.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>
    <div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
