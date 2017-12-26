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
                <div class="col-md-3">
                    <div class="input-group">
                        <select name="skills[][id]" class="form-control" data-change="check-extra">    
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}">@if (count($skill->group()->first()) > 0) {{ $skill->group()->first()->name }} @endif{{ $skill->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="weapons"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                       
                    </div>                        
                </div>                    
                <div class="col-md-3">
                    <a class="btn btn-info btn-sm" data-click="repeateble-remove">
                        <span class="glyphicon glyphicon-trash"></span> Remove
                    </a>
                </div>    
            </div>
            <div class="repeateble-content ">
                <div class="row form-group">
                    <div class="col-md-offset-6 col-md-3">
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
                <div class="col-md-3">
                    <div class="input-group">
                        <select name="weapons[][id]" class="form-control" data-change="check-extra">    
                        @foreach ($weapons as $weapon)
                            <option value="{{ $weapon->id }}">{{ $weapon->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="weapons"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                       
                    </div>                        
                </div>                    
                <div class="col-md-3">
                    <a class="btn btn-info btn-sm" data-click="repeateble-remove">
                        <span class="glyphicon glyphicon-trash"></span> Remove
                    </a>
                </div>    
            </div>
            <div class="repeateble-content ">
                <div class="row form-group">
                    <div class="col-md-offset-6 col-md-3">
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
                <div class="col-md-3">
                    <div class="input-group">
                        <select name="wargear[][id]" class="form-control" data-change="check-extra">    
                        @foreach ($wargear as $wargear_item)
                            <option value="{{ $wargear_item->id }}">{{ $wargear_item->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="wargear"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                       
                    </div>                        
                </div>                    
                <div class="col-md-3">
                    <a class="btn btn-info btn-sm" data-click="repeateble-remove">
                        <span class="glyphicon glyphicon-trash"></span> Remove
                    </a>
                </div>    
            </div>
            <div class="repeateble-content ">
                <div class="row form-group">
                    <div class="col-md-offset-6 col-md-3">
                        <a class="btn btn-info btn-sm" data-click="repeateble-add">
                            <span class="glyphicon glyphicon-trash"></span> Add
                        </a>                
                    </div>                
                </div>
            </div>
        </div>
    </div> 

    <!-- Skill Advances -->
    <div class="form-group">
        {{ Form::label('chapter-skill-advances', 'Speciality Skill Advances') }}
        <div class="repeateble-holder" id="character-skills-holder">           
            @if (count($speciality->skillAdvances()->first()) > 0)        
                @foreach ($speciality->skillAdvances as $skill)
                    <div data-load="repeateble-add" data-id="{{ $skill->id }}" data-extra="[1, 2, 3]" data-extra-1="{{$skill->pivot->cost}}" data-extra-2="{{$skill->pivot->proficeincy}}" data-extra-3="{{$skill->pivot->rank}}"></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-md-4">
                    <div class="input-group"> 
                        <select name="skill_advances[][id]" class="form-control" data-org-name="skill_advances[][id]" data-change="check-extra">    
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}" data-extra="[1, 2, 3]">@if (count($skill->group()->first()) > 0) {{ $skill->group()->first()->name }} @endif{{ $skill->name }} ({{ $attributes[$skill->attribute] }})</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="skills"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                    
                    </div>
                </div>                                 
                <div class="col-md-2">
                    <input type="number" name="skill_advances[][cost]" data-extra-toggle="1"  disabled="disabled" class="form-control" />
                </div>                                
                <div class="col-md-2">
                    <select name="skill_advances[][proficeincy]" data-extra-toggle="2"  disabled="disabled" class="form-control">
                        <option value="0">Trained</option>
                        <option value="10">+10</option>
                        <option value="20">+20</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="number" name="skill_advances[][rank]" data-extra-toggle="3"  disabled="disabled" class="form-control" />
                </div>                                
                
                <div class="col-md-2">
                    <a class="btn btn-info btn-sm" data-click="repeateble-remove">
                        <span class="glyphicon glyphicon-trash"></span> Remove
                    </a>
                </div>    
            </div>
            <div class="repeateble-content ">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label>Skill</label>              
                    </div>                           
                    <div class="col-md-2">
                        <label>Cost</label>              
                    </div>                
                    <div class="col-md-2">
                        <label>Proficiency</label>              
                    </div>                
                    <div class="col-md-2">
                        <label>Rank</label>              
                    </div>                                    
                    <div class="col-md-2">
                        <a class="btn btn-info btn-sm" data-click="repeateble-add">
                            <span class="glyphicon glyphicon-trash"></span> Add
                        </a>                
                    </div>                
                </div>
            </div>
        </div>
    </div>
    
    <!-- Talent Advances -->
    <div class="form-group">
        {{ Form::label('speciality-talent-advances', 'Speciality Talent Advances') }}
        <div class="repeateble-holder" id="speciality-talent-advances-holder">           
            @if (count($speciality->talentAdvances()->first()) > 0)        
                @foreach ($speciality->talentAdvances as $talent)
                    <div data-load="repeateble-add" data-id="{{ $talent->id }}" data-extra-1="{{$talent->pivot->cost}}" data-extra-2="{{$talent->pivot->rank}}" @if ($talent->pivot->talent_option_id) data-extra="[1, 2, 3]" data-extra-3="{{$talent->pivot->talent_option_id}}" @else data-extra="[1, 2]" @endif></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-md-4">
                    <div class="input-group"> 
                        <select name="talent_advances[][id]" class="form-control" data-org-name="talent_advances[][id]" data-change="check-extra">    
                        @foreach ($talents as $talent)
                            <option value="{{ $talent->id }}" @if (count($talent->options()->first()) > 0) data-extra="[1, 2, 3]" data-extra-placeholder-3="Any" data-type-extra-3="options" data-options='{!! $talent->options->toJson() !!}' @else data-extra="[1, 2]"  @endif>{{ $talent->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="talents"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                    
                    </div>
                </div>             
                <div class="col-md-2">
                    <select name="talent_advances[][talent_option_id]" data-extra-toggle="3"  disabled="disabled" class="form-control">

                    </select>
                </div>                 
                <div class="col-md-2">
                    <input type="number" name="talent_advances[][cost]" data-extra-toggle="1"  disabled="disabled" class="form-control" />
                </div>                                
                <div class="col-md-2">
                    <input type="number" name="talent_advances[][rank]" data-extra-toggle="2"  disabled="disabled" class="form-control" />
                </div>                                

                <div class="col-md-2">
                    <a class="btn btn-info btn-sm" data-click="repeateble-remove">
                        <span class="glyphicon glyphicon-trash"></span> Remove
                    </a>
                </div>    
            </div>
            <div class="repeateble-content ">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label>Talent</label>              
                    </div>                           
                    <div class="col-md-2">
                        <label>Talent Option</label>              
                    </div>                                                 
                    <div class="col-md-2">
                        <label>Cost</label>              
                    </div>                             
                    <div class="col-md-2">
                        <label>Rank</label>              
                    </div>                                                 
                    <div class="col-md-2">
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
