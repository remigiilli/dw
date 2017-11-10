@extends('layouts.app')

@section('title', 'Traits')

@section('content')
    <h1>Trait</h1>
    @foreach ($traits as $trait)
	<div>            
            <h4>
                <a data-toggle="collapse" href="#trait-{{ $trait->id }}" aria-expanded="false" aria-controls="trait-{{ $trait->id }}">
                    {{ $trait->name }}
                </a>
            </h4>            
            <div class="collapse" id="trait-{{ $trait->id }}">
              <div class="well">
                    <p>{{ $trait->description }}</p>
              </div>
            </div>
        </div>       
    @endforeach

@endsection 
