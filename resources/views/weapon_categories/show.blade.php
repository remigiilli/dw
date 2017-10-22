@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($weapon_category->id) && $weapon_category->id))
    @include('weapon_categories.single')
@endif
@endsection 
