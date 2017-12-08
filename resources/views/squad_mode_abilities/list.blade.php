@extends('layouts.app')

@section('title', 'Talents')

@section('content')
    <h1>Solo Mode Abilities</h1>
    @foreach ($squad_mode_abilitys as $squad_mode_ability)
	<div>            
            <h4>
                <a data-toggle="collapse" href="#squad_mode_ability-{{ $squad_mode_ability->id }}" aria-expanded="false" aria-controls="squad_mode_ability-{{ $squad_mode_ability->id }}">
                    {{ $squad_mode_ability->name }} @if (count($squad_mode_ability->chapter()->first()) > 0) ({{ $squad_mode_ability->chapter()->first()->name }}) @endif
                </a>
            </h4>            
            <div class="collapse" id="squad_mode_ability-{{ $squad_mode_ability->id }}">
              <div class="well">		
                    <p><b>Cost:</b> {!! nl2br(e($squad_mode_ability->cost)) !!}</p>
                    <p><b>Action:</b> {!! nl2br(e($squad_mode_ability->action)) !!}</p>
                    <p><b>Sustained:</b> @if ($squad_mode_ability->sustained) Yes @else No @endif</p>
                    <p><b>Effect:</b> {!! nl2br(e($squad_mode_ability->effect)) !!}</p>
                    <p><b>Improvement:</b> {!! nl2br(e($squad_mode_ability->improvement)) !!}</p>
              </div>
            </div>
        </div>          
    @endforeach
@endsection 

