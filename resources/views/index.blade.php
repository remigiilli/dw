@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <ul>
    @foreach ($skills as $skill)
	<li>
	@if (count($skill->group()->first()) > 0)	    
	    <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" title="{{ $skill->group()->first()->name }}"  data-content="{{ $skill->group()->first()->description }}">{{ $skill->group()->first()->name }}</a>:
	@endif    	
	<a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" title="{{ $skill->name }}" data-content="{{ $skill->description }}">{{ $skill->name }}</a> ({{ $skill->attribute }})
	</li>
    @endforeach
    </ul>
@endsection 
