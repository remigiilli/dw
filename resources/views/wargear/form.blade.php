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

@if ((isset($wargear->id) && $wargear->id))
    {{ Form::model($wargear, array('method' => 'PUT', 'route' => array('wargear.update', $wargear->id))) }}
@else
    {{ Form::model($wargear, array('method' => 'POST', 'route' => array('wargear.store'))) }}
@endif
    <div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'data-paste' => 'capitalize')) }}
    </div>
   <div class="form-group">
    {{ Form::label('wargear_category_id', 'Category') }}    
    {{ Form::select('wargear_category_id', $wargear_categories, $wargear->wargear_category_id, ['placeholder' => 'Uncategorized', 'class' => 'form-control']) }}
    </div>  
    <div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, array('class' => 'form-control', 'data-paste' => 'remove-newlines')) }}
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
    {{ Form::select('renown', $renow_levels, $wargear->renown, ['class' => 'form-control']) }}
    </div>          
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@endsection 
