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

@if ((isset($psychic_power->id) && $psychic_power->id))
    {{ Form::model($psychic_power, array('method' => 'PUT', 'route' => array('psychicpowers.update', $psychic_power->id))) }}
@else
    {{ Form::model($psychic_power, array('method' => 'POST', 'route' => array('psychicpowers.store'))) }}
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
    {{ Form::label('action', 'Action') }}
    {{ Form::number('action', null, array('class' => 'form-control', 'step' => '0.5')) }}
    </div> 
    <div class="form-group">
    {{ Form::label('opposed', 'Opposed') }} 
    {{ Form::select('opposed', [0 => 'No', 1 => 'Yes'], $psychic_power->opposed, ['class' => 'form-control']) }}
    </div>      
    <div class="form-group">    
	<div class="row">
            <div class="col-lg-6">
                {{ Form::label('range_type', 'Range Type') }}    
                {{ Form::select('range_type', $range_types, $psychic_power->range_type, ['class' => 'form-control']) }}                
            </div>
            <div class="col-lg-6">
                {{ Form::label('range', 'Range') }}
                {{ Form::number('range', null, array('class' => 'form-control')) }}                
            </div>
        </div>
    </div>
    <div class="form-group">
    {{ Form::label('sustained', 'Sustained') }} 
    {{ Form::select('sustained', [0 => 'No', 1 => 'Yes'], $psychic_power->sustained, ['class' => 'form-control']) }}
    </div>      
         
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
