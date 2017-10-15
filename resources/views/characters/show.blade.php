@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($charcter->id) && $charcter->id))
   <h1>{{ $charcter->name }}</h1>
   <p>{{ $charcter->description }}</p>
@endif
@endsection 
