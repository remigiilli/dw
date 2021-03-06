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

@if ((isset($solo_mode_ability->id) && $solo_mode_ability->id))
    {{ Form::model($solo_mode_ability, array('method' => 'PUT', 'route' => array('admin.solomodeabilities.update', $solo_mode_ability->id))) }}
@else
    {{ Form::model($solo_mode_ability, array('method' => 'POST', 'route' => array('admin.solomodeabilities.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}</p>
    </div>
    <div class="form-group">
    {{ Form::label('chapter_id', 'Chapter') }}
    {{ Form::select('chapter_id', $chapters, $solo_mode_ability->chapter_id, ['placeholder' => 'No Chapter', 'class' => 'form-control']) }}
    </div>
    <div class="form-group">
    {{ Form::label('rank', 'Rank') }}
    {{ Form::number('rank', null, array('class' => 'form-control')) }}
    </div>  
    <div class="form-group">
    {{ Form::label('action', 'Action') }}
    {{ Form::number('action', null, array('class' => 'form-control', 'step' => '0.5')) }}
    </div>       
    <div class="form-group">
    {{ Form::label('effect', 'Effect') }}
    {{ Form::textarea('effect', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
    </div>    
    <div class="form-group">
    {{ Form::label('improvement', 'Improvement') }}
    {{ Form::textarea('improvement', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
    </div>    
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
