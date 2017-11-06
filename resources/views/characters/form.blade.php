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
    {{ Form::model($character, array('method' => 'PUT', 'data-submit' => 'repeateble-remove', 'route' => array('characters.update', $character->id))) }}
@else
    {{ Form::model($character, array('method' => 'POST', 'data-submit' => 'repeateble-remove', 'route' => array('characters.store'))) }}
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
        {{ Form::label('character-skills', 'Skills') }}
        <div class="repeateble-holder" id="character-skills-holder">           
            @if (count($character->skills()->first()) > 0)        
                @foreach ($character->skills as $skill)
                    <div data-load="repeateble-add" data-id="{{ $skill->id }}" data-extra="{{$skill->pivot->proficeincy}}"></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-lg-3">
                    <div class="input-group"> 
                        <select name="skills[]" class="form-control" data-change="check-extra">    
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}" data-extra="1">@if (count($skill->group()->first()) > 0) {{ $skill->group()->first()->name }} @endif{{ $skill->name }} ({{ $attributes[$skill->attribute] }})</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="skills"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                    
                    </div>
                </div>                    
                <div class="col-lg-3">
                    <select name="skills[][proficeincy]" data-extra-toggle="1"  disabled="disabled" class="form-control">
                        <option value="0">Trained</option>
                        <option value="10">+10</option>
                        <option value="20">+20</option>
                    </select>
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
    <!-- Talents -->    
    <div class="form-group">
        {{ Form::label('character-talents', 'Talents') }}
        <div class="repeateble-holder" id="character-talents-holder">           
            @if (count($character->talents()->first()) > 0)        
                @foreach ($character->talents as $talent)
                    <div data-load="repeateble-add" data-id="{{ $talent->id }}" @if ($talent->pivot->talent_option_id) data-extra="{{$talent->pivot->talent_option_id}}" @endif></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-lg-3">
                    <div class="input-group"> 
                        <select name="talents[]" class="form-control" data-org-name="talents[]" data-change="check-extra">    
                        @foreach ($talents as $talent)
                            <option value="{{ $talent->id }}" @if (count($talent->options()->first()) > 0) data-extra="options" data-options='{!! $talent->options->toJson() !!}' @endif>{{ $talent->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="talents"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                       
                    </div>
                </div>                    
                <div class="col-lg-3">
                    <select name="talents[][]" data-extra-toggle="1"  disabled="disabled" class="form-control">

                    </select>
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
    <!-- Traits -->
    <div class="form-group">
        {{ Form::label('character-traits', 'Traits') }}
        <div class="repeateble-holder" id="character-traits-holder">           
            @if (count($character->traits()->first()) > 0)        
                @foreach ($character->traits as $trait)
                    <div data-load="repeateble-add" data-id="{{ $trait->id }}"></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-lg-3">
                    <div class="input-group">      
                        <select name="traits[]" class="form-control" data-change="check-extra">    
                        @foreach ($traits as $trait)
                            <option value="{{ $trait->id }}" data-extra="1">{{ $trait->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="traits"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                        
                    </div>                                            
                </div>                    
                <div class="col-lg-3">

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
    
    <!-- Weapons -->
    <div class="form-group">
        {{ Form::label('character-weapons', 'Weapons') }}
        <div class="repeateble-holder" id="character-weapons-holder">           
            @if (count($character->weapons()->first()) > 0)        
                @foreach ($character->weapons as $weapon)
                    <div data-load="repeateble-add" data-id="{{ $weapon->id }}"></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-lg-3">
                    <div class="input-group">      
                        <select name="weapons[]" class="form-control" data-change="check-extra">    
                        @foreach ($weapons as $weapon)
                            <option value="{{ $weapon->id }}" data-extra="1">{{ $weapon->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="weapons"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                      
                    </div>                        
                </div>                    
                <div class="col-lg-3">

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
    
    <!-- PsychicPower -->
    <div class="form-group">
        {{ Form::label('character-psychic-powers', 'Psychic Powers') }}
        <div class="repeateble-holder" id="character-psychic-powers-holder">           
            @if (count($character->psychicPowers()->first()) > 0)        
                @foreach ($character->psychicPower as $psychic_power)
                    <div data-load="repeateble-add" data-id="{{ $psychic_power->id }}"></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-lg-3">
                    <div class="input-group">      
                        <select name="psychic_powers[]" class="form-control" data-change="check-extra">    
                        @foreach ($psychic_powers as $psychic_power)
                            <option value="{{ $psychic_power->id }}" data-extra="1">{{ $psychic_power->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="psychicpowers"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                      
                    </div>                        
                </div>                    
                <div class="col-lg-3">

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
    <!-- Wargear -->
    <div class="form-group">
        {{ Form::label('character-wargears', 'Wargear') }}
        <div class="repeateble-holder" id="character-wargears-holder">           
            @if (count($character->wargear()->first()) > 0)        
                @foreach ($character->wargear as $wargear)
                    <div data-load="repeateble-add" data-id="{{ $wargear->id }}"></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-lg-3">
                    <div class="input-group">    
                        <select name="wargears[]" class="form-control" data-change="check-extra">    
                        @foreach ($wargear as $wargear)
                            <option value="{{ $wargear->id }}" data-extra="1">{{ $wargear->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="wargear"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                    
                    </div>
                </div>                    
                <div class="col-lg-3">

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
