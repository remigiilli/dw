@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($solo_mode_ability->id) && $solo_mode_ability->id))
    @include('solo_mode_abilities.single')
@endif
@endsection 
