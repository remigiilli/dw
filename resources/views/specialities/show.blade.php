@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($speciality->id) && $speciality->id))
    @include('specialities.single')
@endif
@endsection 
