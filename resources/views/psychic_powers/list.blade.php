@extends('layouts.app')

@section('title', 'Psychic Powers')

@section('content')
    <h1>@if (isset($psychic_power_category)) {{ $psychic_power_category->name }} @else Psychic Powers @endif</h1>
    <div class="row">
        <div class="col-md-3">            
            <b>Name</b>
        </div>
        <div class="col-md-3">            
            <b>Action</b>
        </div>            
        <div class="col-md-2">    
            <b>Opposed</b>
        </div>
        <div class="col-md-2">    
            <b>Range</b>
        </div>
        <div class="col-md-2">    
            <b>Sustained</b>
        </div>
    </div>
    @foreach ($psychic_powers as $psychic_power)
	<div class="element">   
            <div class="row">
                <div class="col-md-3">            
                    <b>
                        <a data-toggle="collapse" href="#psychic-powers-{{ $psychic_power->id }}" aria-expanded="false" aria-controls="psychic-powers-{{ $psychic_power->id }}">
                            {{ $psychic_power->name }}  @if (count($psychic_power->chapter()->first()) > 0) {{ $psychic_power->chapter()->first()->name }} @endif
                        </a>
                    </b>            
                </div>
                <div class="col-md-3">
                    @if (!$psychic_power->action)	
                        Free
                    @elseif ($psychic_power->action == 0.5)
                        Half
                    @elseif ($psychic_power->action > 1)
                        extended ({{ $psychic_power->action }})
                    @else
                         {{ $psychic_power->action }}
                    @endif
                </div>
                <div class="col-md-2">
                    @if ($psychic_power->opposed) Yes @else No @endif
                </div>
                <div class="col-md-2">
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
                </div>                
                <div class="col-md-2">
                    @if ($psychic_power->sustained) Yes @else No @endif
                </div>                                              
            </div>
            <div class="collapse" id="psychic-powers-{{ $psychic_power->id }}">
                <div class="well">    
                    @if (!isset($psychic_power_category))
                        <b>@if (count($psychic_power->category()->first()) > 0) {{ $psychic_power->category()->first()->name }} @else Uncategorized @endif</b><br/><br/>
                    @endif
                    {!! nl2br(e($psychic_power->description)) !!}   
                </div>
            </div>
        </div>                      
    @endforeach
@endsection 
