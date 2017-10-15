@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($talent_option->id) && $talent_option->id))
   <h1>{{ $talent_option->name }}</h1>
   <p>{{ $talent_option->description }}</p>
@endif
@endsection 
