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

@if ((isset($special_ability->id) && $special_ability->id))
    {{ Form::model($special_ability, array('method' => 'PUT', 'route' => array('admin.specialabilities.update', $special_ability->id))) }}
@else
    {{ Form::model($special_ability, array('method' => 'POST', 'route' => array('admin.specialabilities.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>
    <div class="form-group">
    {{ Form::label('speciality_id', 'Speciality') }}
    {{ Form::select('speciality_id', $specialities, $special_ability->speciality_id, ['placeholder' => 'No Speciality', 'class' => 'form-control']) }}
    </div>    
    <div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
    </div>       
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
