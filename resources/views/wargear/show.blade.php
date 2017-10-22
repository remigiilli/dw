@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($wargear_item->id) && $wargear_item->id))
   @include('wargears.single')
@endif
@endsection 
