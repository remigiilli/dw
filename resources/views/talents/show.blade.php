@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($talent->id) && $talent->id))
    @include('talents.single')
@endif
@endsection 
