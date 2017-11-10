@extends('layouts.app')

@section('title', '{{ $psychic_power_category->name }}')

@section('content')

    <h1>{{ $psychic_power_category->name }}</h1>
    @foreach ($psychic_powers as $psychic_power)
	<div>            
            <h4>
                <a data-toggle="collapse" href="#psychic-powers-{{ $psychic_power->id }}" aria-expanded="false" aria-controls="psychic-powers-{{ $psychic_power->id }}">
                    {{ $psychic_power->name }}
                </a>
            </h4>            
            <div class="collapse" id="psychic-powers-{{ $psychic_power->id }}">
                <div class="well">    
                    <p><b>Action</b> 
                    @if (!$psychic_power->action)	
                        Free
                    @elseif ($psychic_power->action == 0.5)
                        Half
                    @elseif ($psychic_power->action > 1)
                        extended ({{ $psychic_power->action }})
                    @else
                         {{ $psychic_power->action }}
                    @endif</p>
                    <p><b>Opposed</b> @if ($psychic_power->opposed) Yes @else No @endif</p>
                    <p><b>Range</b> 
                    @if ($psychic_power->range_type == 0)	
                        Self
                    @elseif ($psychic_power->range_type == 1)
                        Touch
                    @elseif ($psychic_power->range_type == 2)
                        {{ $psychic_power->range }} metres x PR
                    @elseif ($psychic_power->range_type == 3)
                        {{ $psychic_power->range }} metres radius x PR
                    @elseif ($psychic_power->range_type == 5)
                        {{ $psychic_power->range }} metres
                    @elseif ($psychic_power->range_type == 6)
                        {{ $psychic_power->range }} metres + PR
                    @elseif ($psychic_power->range_type == 7)
                        {{ $psychic_power->range }}d10 metres x PR    
                    @else
                        Special
                    @endif    
                    </p>  
                    <p><b>Sustained</b> @if ($psychic_power->sustained) Yes @else No @endif</p>
                    <p>{!! nl2br(e($psychic_power->description)) !!}</p>   
                </div>
            </div>
        </div>                      
    @endforeach
@endsection 
