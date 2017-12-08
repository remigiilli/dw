@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($chapter->id) && $chapter->id))
    @include('chapters.single')
@endif
@endsection 
