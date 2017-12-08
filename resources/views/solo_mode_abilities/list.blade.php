@extends('layouts.app')

@section('title', 'Talents')

@section('content')
    <h1>Solo Mode Abilities</h1>
    @foreach ($solo_mode_abilitys as $solo_mode_ability)
	<div>            
            <h4>
                <a data-toggle="collapse" href="#solo_mode_ability-{{ $solo_mode_ability->id }}" aria-expanded="false" aria-controls="solo_mode_ability-{{ $solo_mode_ability->id }}">
                    {{ $solo_mode_ability->name }} @if (count($solo_mode_ability->chapter()->first()) > 0) ({{ $solo_mode_ability->chapter()->first()->name }}) @endif
                </a>
            </h4>            
            <div class="collapse" id="solo_mode_ability-{{ $solo_mode_ability->id }}">
              <div class="well">		
                    <p><b>Rank:</b> {!! nl2br(e($solo_mode_ability->rank)) !!}</p>
                    <p><b>Action:</b> {!! nl2br(e($solo_mode_ability->action)) !!}</p>
                    <p><b>Effect:</b> {!! nl2br(e($solo_mode_ability->effect)) !!}</p>
                    <p><b>Improvement:</b> {!! nl2br(e($solo_mode_ability->improvement)) !!}</p>
              </div>
            </div>
        </div>          
    @endforeach
@endsection 

