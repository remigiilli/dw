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

@if ((isset($skill_group->id) && $skill_group->id))
    {{ Form::model($skill_group, array('method' => 'PUT', 'route' => array('admin.skillgroups.update', $skill_group->id))) }}
@else
    {{ Form::model($skill_group, array('method' => 'POST', 'route' => array('admin.skillgroups.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>
    <div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
    </div>
    <div class="form-group">
    {{ Form::label('use', 'Skill Use') }}
    {{ Form::textarea('use', null, array('class' => 'form-control')) }}
    </div>    
    <div class="form-group">
    {{ Form::label('special', 'Special Uses') }}
    {{ Form::textarea('special', null, array('class' => 'form-control')) }}
    </div>           
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
