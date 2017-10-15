@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($skill->id) && $skill->id))
   <h1>{{ $skill->name }}</h1>
   <p>{{ $skill->description }}</p>
@endif
@endsection 
