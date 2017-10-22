@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    @if (count($talents))
	<h2>Talents</h2>
	@foreach ($talents as $talent)
	    @include('talents.single')
	@endforeach
    @endif
    @if (count($skills))       
	<h2>Skills</h2>
	@foreach ($skills as $skill)
	    @include('skills.single')
	@endforeach 
    @endif      
    @if (count($traits))
	<h2>Traits</h2>
	@foreach ($traits as $trait)
	    @include('traits.single')
	@endforeach
    @endif
    @if (count($psychic_powers))
	<h2>Psychic Powers</h2>
	@foreach ($psychic_powers as $psychic_power)
	    @include('psychic_powers.single')
	@endforeach
    @endif    
    @if (count($weapons))
	<h2>Weapons</h2>
	@foreach ($weapons as $weapon)	
	    @include('weapons.single')
	@endforeach    
    @endif    
    @if (count($special_qualities))
	<h2>Special Qualities</h2>
	@foreach ($special_qualities as $special_quality)	
	    @include('special_qualities.single')
	@endforeach    
    @endif    
@endsection 
