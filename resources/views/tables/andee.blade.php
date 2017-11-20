@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@include('tables.general.rank1')
@include('tables.general.rank2')
@include('tables.deathwatch.rank1')
@include('tables.deathwatch.rank2')

@include('tables.devastator.characteristics')
@include('tables.devastator.rank1')
@include('tables.devastator.rank2')

@include('tables.chapters.blood_angels')
@endsection 