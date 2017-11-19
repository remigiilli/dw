@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@include('tables.rank1_general')
@include('tables.rank2_general')
@include('tables.rank1_deathwatch')
@include('tables.rank2_deathwatch')

@include('tables.apothecary_characteristics')
@include('tables.rank1_apothecary')
@include('tables.rank2_apothecary')

@include('tables.ultramarines')
@endsection 