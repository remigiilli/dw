@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@include('tables.rank1_general')
@include('tables.rank2_general')
@include('tables.rank1_deathwatch')
@include('tables.rank2_deathwatch')

@include('tables.tactical_marine_characteristics')
@include('tables.rank1_tactical_marine')
@include('tables.rank2_tactical_marine')

@include('tables.ultramarines')
@endsection 