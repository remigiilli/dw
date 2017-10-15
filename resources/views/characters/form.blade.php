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

@if ((isset($character->id) && $character->id))
    {{ Form::model($character, array('method' => 'PUT', 'route' => array('characters.update', $character->id))) }}
@else
    {{ Form::model($character, array('method' => 'POST', 'route' => array('characters.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('ws', 'WS') }}
    {{ Form::number('ws', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('bs', 'BS') }}
    {{ Form::number('bs', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('s', 'S') }}
    {{ Form::number('s', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('t', 'T') }}
    {{ Form::number('t', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('ag', 'Ag') }}
    {{ Form::number('ag', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('int', 'Int') }}
    {{ Form::number('int', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('per', 'Per') }}
    {{ Form::number('per', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('wp', 'WP') }}
    {{ Form::number('wp', null, array('class' => 'form-control')) }}
    </div>    
    <div class="form-group">
    {{ Form::label('fel', 'Fel') }}
    {{ Form::number('fel', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('wounds', 'Wounds') }}
    {{ Form::number('wounds', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
    {{ Form::label('psy', 'Psy-Rating') }}
    {{ Form::number('psy', null, array('class' => 'form-control')) }}
    </div>
    <!-- Skills -->
    <div class="form-group">

    </div>    
    <!-- Talents -->    
    <div class="form-group">
    
    </div>    
    <!-- Traits -->
    <div class="form-group">
    </div>    
    <!-- Weapons -->
    <div class="form-group">
    </div>       
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
