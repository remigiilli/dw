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

@if ((isset($weapon->id) && $weapon->id))
    {{ Form::model($weapon, array('method' => 'PUT', 'route' => array('weapons.update', $weapon->id))) }}
@else
    {{ Form::model($weapon, array('method' => 'POST', 'route' => array('weapons.store'))) }}
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
    {{ Form::label('type', 'Class') }}    
    {{ Form::select('type', $classes, $weapon->type, ['placeholder' => 'No Class...', 'class' => 'form-control']) }}
    </div>      
    <div class="form-group">    
	<div class="row">
            <div class="col-lg-6">
                {{ Form::label('range_type', 'Range Type') }}    
                {{ Form::select('range_type', $range_types, $weapon->range_type, ['class' => 'form-control']) }}                
            </div>
            <div class="col-lg-6">
                {{ Form::label('range', 'Range') }}
                {{ Form::number('range', null, array('class' => 'form-control')) }}                
            </div>
        </div>
    </div>
    <div class="form-group">    
	<div class="row">
	    <div class="col-lg-4">    
		{{ Form::label('rof1', 'Single Shot') }}
		{{ Form::select('rof1', [0 => '-', 1 => 'S'], $weapon->rof1, ['class' => 'form-control']) }}
	    </div>
	    <div class="col-lg-4">    
		{{ Form::label('rof2', 'Burst') }}
		{{ Form::number('rof2', null, array('class' => 'form-control')) }} 
	    </div>
	    <div class="col-lg-4">    
		{{ Form::label('rof3', 'Auto') }}
		{{ Form::number('rof3', null, array('class' => 'form-control')) }}
	    </div>
	  </div>
    </div>
    <div class="form-group">
	<div class="row">
	    <div class="col-lg-3">            
		{{ Form::label('dmg1', 'Damage Dice Amount') }}
		{{ Form::number('dmg1', null, array('class' => 'form-control')) }}
	    </div>            
	    <div class="col-lg-3">            
	    {{ Form::label('dmg2', 'Damage Dice Sides') }}
	    {{ Form::number('dmg2', null, array('class' => 'form-control')) }}
	    </div>            
	    <div class="col-lg-3">            
	    {{ Form::label('dmg3', 'Damage Bonus') }}
	    {{ Form::number('dmg3', null, array('class' => 'form-control')) }}
	    </div>                
	    <div class="col-lg-3">            
	    {{ Form::label('dmg4', 'Damage Type') }}    
	    {{ Form::select('dmg4', $damage_types, $weapon->dmg4, ['placeholder' => 'Pick an Damage Type...', 'class' => 'form-control']) }}
	    </div>        
	</div>
    </div>
    <div class="form-group">
    {{ Form::label('pen', 'Penetration') }}
    {{ Form::number('pen', null, array('class' => 'form-control')) }}
    </div>    
    <div class="form-group">
    {{ Form::label('clip', 'Clip') }}
    {{ Form::number('clip', null, array('class' => 'form-control')) }}
    </div>      
    <div class="form-group">
    {{ Form::label('rld', 'Reload') }}
    {{ Form::number('rld', null, array('class' => 'form-control', 'step' => '0.5')) }}
    </div>  
    <div class="form-group">
    {{ Form::label('weight', 'Weight') }}
    {{ Form::number('weight', null, array('class' => 'form-control')) }}
    </div>       
    <div class="form-group">
    {{ Form::label('req', 'Requisition') }}
    {{ Form::number('req', null, array('class' => 'form-control')) }}
    </div>      
    <div class="form-group">
    {{ Form::label('renown', 'Renown') }}    
    {{ Form::select('renown', $renow_levels, $weapon->renown, ['placeholder' => 'Pick an Renown Level...', 'class' => 'form-control']) }}
    </div>          
    
    <div class="form-group">
    {{ Form::label('weapon-special-qualities', 'Options') }}
    {{ Form::select('special_qualities[]', $special_qualities, $weapon->specialQualities->lists('id')->all(), ['multiple' => 'multiple', 'id' => 'weapon-special-qualities', 'class' => 'form-control']) }}
    </div>    
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
