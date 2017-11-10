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
    {{ Form::model($weapon, array('method' => 'PUT', 'route' => array('admin.weapons.update', $weapon->id))) }}
@else
    {{ Form::model($weapon, array('method' => 'POST', 'route' => array('admin.weapons.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}
    </div>
    <div class="form-group">
    {{ Form::label('weapon_category_id', 'Category') }}    
    {{ Form::select('weapon_category_id', $weapon_categories, $weapon->weapon_category_id, ['placeholder' => 'Uncategorized', 'class' => 'form-control']) }}
    </div>  
    <div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
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
    {{ Form::number('weight', null, array('class' => 'form-control', 'step' => '0.5')) }}
    </div>       
    <div class="form-group">
    {{ Form::label('req', 'Requisition') }}
    {{ Form::number('req', null, array('class' => 'form-control')) }}
    </div>      
    <div class="form-group">
    {{ Form::label('renown', 'Renown') }}    
    {{ Form::select('renown', $renow_levels, $weapon->renown, ['class' => 'form-control']) }}
    </div>          
    
    <div class="form-group">
        {{ Form::label('weapon-special-qualities', 'Options') }}
        <div class="repeateble-holder" id="weapon-special-qualities-holder">           
            @if (count($weapon->specialQualities()->first()) > 0)        
                @foreach ($weapon->specialQualities as $special_quality)
                    <div data-load="repeateble-add" data-id="{{ $special_quality->id }}"@if ($special_quality->extra) data-extra="{{$special_quality->pivot->extra}}"@endif></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-lg-3">
                    <select name="special_qualities[]" class="form-control" data-change="check-extra">    
                    @foreach ($special_qualities as $special_quality)
                        <option value="{{ $special_quality->id }}"
                                @if ($special_quality->extra) data-extra="1" @endif                                 
                        >{{ $special_quality->name }}</option>        
                    @endforeach
                    </select>
                </div>                    
                <div class="col-lg-3">
                    <input name="special_qualities[][extra]" data-extra-toggle="1" type="text" disabled="disabled" class="form-control" />    
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-info btn-sm" data-click="repeateble-remove">
                        <span class="glyphicon glyphicon-trash"></span> Remove
                    </a>
                </div>    
            </div>
            <div class="repeateble-content ">
                <div class="row form-group">
                    <div class="col-md-offset-6 col-lg-3">
                        <a class="btn btn-info btn-sm" data-click="repeateble-add">
                            <span class="glyphicon glyphicon-trash"></span> Add
                        </a>                
                    </div>                
                </div>
            </div>
        </div>
    </div>    
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
