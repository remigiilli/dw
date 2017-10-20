@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($trait->id) && $trait->id))
    @include('traits.single')
@endif
@endsection 
