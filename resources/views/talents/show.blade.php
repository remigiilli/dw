@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($talent->id) && $talent->id))
   <h1>{{ $talent->name }}</h1>
   <p>{{ $talent->description }}</p>
@endif
@endsection 
