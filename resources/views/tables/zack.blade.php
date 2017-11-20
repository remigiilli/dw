@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@include('tables.general.rank1')
@include('tables.general.rank2')
@include('tables.deathwatch.rank1')
@include('tables.deathwatch.rank2')

@include('tables.apothecary_characteristics')
@include('tables.rank1_apothecary')
@include('tables.rank2_apothecary')

@include('tables.chapters.ultramarines')
@endsection 