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

@if ((isset($chapter->id) && $chapter->id))
    {{ Form::model($chapter, array('method' => 'PUT', 'route' => array('admin.chapters.update', $chapter->id))) }}
@else
    {{ Form::model($chapter, array('method' => 'POST', 'route' => array('admin.chapters.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>
    <div class="form-group">
    {{ Form::label('creation', 'Creation') }}
    {{ Form::textarea('creation', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
    </div>    
    <div class="form-group">
    {{ Form::label('demeanour_title', 'Demenour Title') }}
    {{ Form::text('demeanour_title', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>
    <div class="form-group">
    {{ Form::label('demeanour_description', 'Demenour Description') }}
    {{ Form::textarea('demeanour_description', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
    </div>    
    <div class="form-group">
    {{ Form::label('curse_title', 'Curse Title') }}
    {{ Form::text('curse_title', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>
    <div class="form-group">
    {{ Form::label('curse_description', 'Curse Description') }}
    {{ Form::textarea('curse_description', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
    </div>    
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
