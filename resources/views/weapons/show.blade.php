@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($weapon->id) && $weapon->id))
   @include('weapons.single')
@endif
@endsection 
