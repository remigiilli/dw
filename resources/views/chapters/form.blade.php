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

@if ((isset($chapter->id) && $chapter->id))
    {{ Form::model($chapter, array('method' => 'PUT', 'data-submit' => 'repeateble-remove', 'route' => array('admin.chapters.update', $chapter->id))) }}
@else
    {{ Form::model($chapter, array('method' => 'POST', 'data-submit' => 'repeateble-remove', 'route' => array('admin.chapters.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>
    <div class="form-group">
    {{ Form::label('creation', 'Creation') }}
    {{ Form::textarea('creation', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
    </div>    
    <div class="form-group">
    {{ Form::label('demeanour_title', 'Demenour Title') }}
    {{ Form::text('demeanour_title', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>
    <div class="form-group">
    {{ Form::label('demeanour_description', 'Demenour Description') }}
    {{ Form::textarea('demeanour_description', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
    </div>    
    <div class="form-group">
    {{ Form::label('curse_title', 'Curse Title') }}
    {{ Form::text('curse_title', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>
    <div class="form-group">
    {{ Form::label('curse_description', 'Curse Description') }}
    {{ Form::textarea('curse_description', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
    </div>    
    <!-- Skill Advances -->
    <div class="form-group">
        {{ Form::label('chapter-skill-advances', 'Chapter Skill Advances') }}
        <div class="repeateble-holder" id="character-skills-holder">           
            @if (count($chapter->skillAdvances()->first()) > 0)        
                @foreach ($chapter->skillAdvances as $skill)
                    <div data-load="repeateble-add" data-id="{{ $skill->id }}" data-extra="[1, 2]" data-extra-1="{{$skill->pivot->cost}}" data-extra-2="{{$skill->pivot->proficeincy}}"></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-md-4">
                    <div class="input-group"> 
                        <select name="skills[][id]" class="form-control" data-org-name="skills[][id]" data-change="check-extra">    
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}" data-extra="[1, 2]">@if (count($skill->group()->first()) > 0) {{ $skill->group()->first()->name }} @endif{{ $skill->name }} ({{ $attributes[$skill->attribute] }})</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="skills"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                    
                    </div>
                </div>                                 
                <div class="col-md-2">
                    <input type="number" name="skills[][cost]" data-extra-toggle="1"  disabled="disabled" class="form-control" />
                </div>                                
                <div class="col-md-2">
                    <select name="skills[][proficeincy]" data-extra-toggle="2"  disabled="disabled" class="form-control">
                        <option value="0">Trained</option>
                        <option value="10">+10</option>
                        <option value="20">+20</option>
                    </select>
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
        {{ Form::label('chapter-talent-advances', 'Chapter Talent Advances') }}
        <div class="repeateble-holder" id="character-talents-holder">           
            @if (count($chapter->talentAdvances()->first()) > 0)        
                @foreach ($chapter->talentAdvances as $talent)
                    <div data-load="repeateble-add" data-id="{{ $talent->id }}" data-extra-1="{{$talent->pivot->cost}}"@if ($talent->pivot->talent_option_id)  data-extra="[1, 2]" data-extra-2="{{$talent->pivot->talent_option_id}}" @else  data-extra="[1]" @endif></div>
                @endforeach                       
            @endif                        
            <div class="repeateble-template form-group row">
                <div class="col-md-4">
                    <div class="input-group"> 
                        <select name="talents[][id]" class="form-control" data-org-name="talents[][id]" data-change="check-extra">    
                        @foreach ($talents as $talent)
                            <option value="{{ $talent->id }}" @if (count($talent->options()->first()) > 0) data-extra="[1, 2]" data-extra-placeholder-2="Any" data-type-extra-2="options" data-options='{!! $talent->options->toJson() !!}' @else data-extra="[1]"  @endif>{{ $talent->name }}</option>        
                        @endforeach
                        </select>
                        <span class="input-group-btn">
                          <button class="btn btn-info" type="button" data-toggle="popoverload-selected" data-type="talents"><span class="glyphicon glyphicon-question-sign"></span></button>
                        </span>                    
                    </div>
                </div>                     
                <div class="col-md-3">
                    <select name="talents[][talent_option_id]" data-extra-toggle="2"  disabled="disabled" class="form-control">

                    </select>
                </div>                
                <div class="col-md-2">
                    <input type="number" name="talents[][cost]" data-extra-toggle="1"  disabled="disabled" class="form-control" />
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
                    <div class="col-md-4">
                        <label>Talent Option</label>              
                    </div>                    
                    <div class="col-md-2">
                        <label>Cost</label>              
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
