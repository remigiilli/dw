@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($weapon->id) && $weapon->id))
   <h1>{{ $weapon->name }}</h1>
   <p>{{ $weapon->description }}</p>
@endif
@endsection 
