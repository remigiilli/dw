@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($user->id) && $user->id))
    @include('users.single')
@endif
@endsection 
