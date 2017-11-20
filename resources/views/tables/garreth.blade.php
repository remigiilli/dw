@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@include('tables.general.rank1')
@include('tables.deathwatch.rank1')


@include('tables.librarian.characteristics')
@include('tables.librarian.rank1')

@include('tables.chapters.blood_ravens')
@endsection 