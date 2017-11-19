@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@include('tables.rank1_general')
@include('tables.rank2_general')
@include('tables.rank1_deathwatch')
@include('tables.rank2_deathwatch')

@include('tables.devastator_characteristics')
@include('tables.rank1_devastator')
@include('tables.rank2_devastator')

@include('tables.blood_angels')
@endsection 