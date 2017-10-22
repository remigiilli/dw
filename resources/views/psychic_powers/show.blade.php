@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($psychic_power->id) && $psychic_power->id))
   @include('psychic_powers.single')
@endif
@endsection 
