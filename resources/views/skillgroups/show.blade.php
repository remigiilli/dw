@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@if ((isset($skill_group->id) && $skill_group->id))
   <h1>{{ $skill_group->name }}</h1>
   <p>{{ $skill_group->description }}</p>
@endif
@endsection 
