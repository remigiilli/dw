@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($squad_mode_ability->id) && $squad_mode_ability->id))
    @include('squad_mode_abilities.single')
@endif
@endsection 
