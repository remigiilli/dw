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

@if ((isset($speciality->id) && $speciality->id))
    {{ Form::model($speciality, array('method' => 'PUT', 'data-submit' => 'repeateble-remove', 'route' => array('admin.specialities.update', $speciality->id))) }}
@else
    {{ Form::model($speciality, array('method' => 'POST', 'route' => array('admin.specialities.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>

    <div class="form-group">
        {{ Form::label('speciality-skills', 'Starting Skills') }}
        <div class="repeateble-holder" id="speciality-skills-holder">           
            @if (count($speciality->skills()->first()) > 0)        
                @foreach ($speciality->skills as $skill)
                    <div data-load="repeateble-add" data-id="{{ $skill->id }}"></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-lg-3">
                    <div class="input-group">
                        <select name="skills[]" class="form-control" data-change="check-extra">    
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}">@if (count($skill->group()->first()) > 0) {{ $skill->group()->first()->name }} @endif{{ $skill->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="weapons"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                       
                    </div>                        
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

    <div class="form-group">
        {{ Form::label('speciality-weapons', 'Starting Weapons') }}
        <div class="repeateble-holder" id="speciality-weapons-holder">           
            @if (count($speciality->weapons()->first()) > 0)        
                @foreach ($speciality->weapons as $weapon)
                    <div data-load="repeateble-add" data-id="{{ $weapon->id }}"></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-lg-3">
                    <div class="input-group">
                        <select name="weapons[]" class="form-control" data-change="check-extra">    
                        @foreach ($weapons as $weapon)
                            <option value="{{ $weapon->id }}">{{ $weapon->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="weapons"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                       
                    </div>                        
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

    <div class="form-group">
        {{ Form::label('speciality-wargear', 'Starting Wargear') }}
        <div class="repeateble-holder" id="speciality-wargear-holder">           
            @if (count($speciality->wargear()->first()) > 0)        
                @foreach ($speciality->wargear as $wargear_item)
                    <div data-load="repeateble-add" data-id="{{ $wargear_item->id }}"></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-lg-3">
                    <div class="input-group">
                        <select name="wargear[]" class="form-control" data-change="check-extra">    
                        @foreach ($wargear as $wargear_item)
                            <option value="{{ $wargear_item->id }}">{{ $wargear_item->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="wargear"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                       
                    </div>                        
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
