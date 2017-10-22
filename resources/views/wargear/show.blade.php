@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($wargear->id) && $wargear->id))
   @include('wargears.single')
@endif
@endsection 
