@extends('layouts.app')

@section('title', 'Talents')

@section('content')
    <h1>Solo Mode Abilities</h1>
    @foreach ($special_abilitys as $special_ability)
	<div>            
            <h4>
                <a data-toggle="collapse" href="#special_ability-{{ $special_ability->id }}" aria-expanded="false" aria-controls="special_ability-{{ $special_ability->id }}">
                    {{ $special_ability->name }} @if (count($special_ability->speciality()->first()) > 0) ({{ $special_ability->speciality()->first()->name }}) @endif
                </a>
            </h4>            
            <div class="collapse" id="special_ability-{{ $special_ability->id }}">
              <div class="well">		
                    <p>{!! nl2br(e($special_ability->description)) !!}</p>
              </div>
            </div>
        </div>          
    @endforeach
@endsection 

