@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@include('tables.general.rank1')
@include('tables.general.rank2')
@include('tables.deathwatch.rank1')
@include('tables.deathwatch.rank2')

@include('tables.tactical_marine.characteristics')
@include('tables.tactical_marine.rank1')
@include('tables..tactical_marine.rank2')

@include('tables.chapters.ultramarines')
@endsection 