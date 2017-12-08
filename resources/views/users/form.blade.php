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

@if ((isset($user->id) && $user->id))
    {{ Form::model($user, array('method' => 'PUT', 'route' => array('admin.users.update', $user->id))) }}
@else
    {{ Form::model($user, array('method' => 'POST', 'route' => array('admin.users.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('username', 'username') }}
    {{ Form::text('username', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('email', 'E-Mail') }}
    {{ Form::text('email', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        <div class="checkbox">        
            <label for="admin">
                {{ Form::checkbox('admin', 1, null) }} Admin
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
