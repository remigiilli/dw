@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($wargear_category->id) && $wargear_category->id))
    @include('wargear_categories.single')
@endif
@endsection 
