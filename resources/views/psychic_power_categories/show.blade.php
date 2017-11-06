@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($psychic_power_category->id) && $psychic_power_category->id))
    @include('psychic_power_categories.single')
@endif
@endsection 
