@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($special_quality->id) && $special_quality->id))
   <h1>{{ $special_quality->name }}</h1>
   <p>{{ $special_quality->description }}</p>   
@endif
@endsection 
