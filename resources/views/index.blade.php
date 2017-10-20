@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
{{ Form::open(array('url' => 'search')) }}
    <div class="form-group">
    {{ Form::label('search', 'Search For') }}
    {{ Form::text('search', null, array('class' => 'form-control')) }}
    <button type="submit" class="btn btn-primary">Submit</button>        
    </div>    
{{ Form::close() }}    
@endsection 
