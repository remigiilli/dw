@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($special_ability->id) && $special_ability->id))
    @include('special_abilities.single')
@endif
@endsection 
