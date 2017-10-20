@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($special_quality->id) && $special_quality->id))
    @include('special_qualities.single')
@endif
@endsection 
