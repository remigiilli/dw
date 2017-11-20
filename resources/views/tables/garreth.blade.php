@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@include('tables.rank1_general')
@include('tables.rank1_deathwatch')

@include('tables.librarian_characteristics')
@include('tables.rank1_librarian')

@include('tables.blood_ravens')
@endsection 