@extends('layouts.app')

@section('title', 'Talents')

@section('content')
    <h1>Specialities</h1>
    @foreach ($specialitys as $speciality)
	<div>            
            <h4>
                <a data-toggle="collapse" href="#speciality-{{ $speciality->id }}" aria-expanded="false" aria-controls="speciality-{{ $speciality->id }}">
                    {{ $speciality->name }}
                </a>
            </h4>            
            <div class="collapse" id="speciality-{{ $speciality->id }}">
                @if (count($speciality->specialAbilities()->first()) > 0)
                    <h5>Special Abilities:</h5>
                    @foreach ($speciality->specialAbilities as $special_ability)
                         <a href="#" data-toggle="popoverload" data-id="{{ $special_ability->id }}" data-type="specialqualities">{{ $special_ability->name }}</a> 	 
                    @endforeach
                @endif
            </div>
        </div>          
    @endforeach
@endsection 

