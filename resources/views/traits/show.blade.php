@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($trait->id) && $trait->id))
   <h1>{{ $trait->name }}</h1>
   <p>{{ $trait->description }}</p>
@endif
@endsection 
