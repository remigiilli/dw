@extends('layouts.app')

@section('title', 'Weapons')

@section('content')
    @if (isset($weapon_category)) 
        <h1>{{ $weapon_category->name }}</h1>
        <p>{{ $weapon_category->description }}</p>
    @else 
        <h1>Weapons</h1>
    @endif        
    @foreach ($weapons as $weapon)
	<div class="element">                        
            <div class="row">
                <div class="col-md-3">
                    <b>
                        <a data-toggle="collapse" href="#weapon-{{ $weapon->id }}" aria-expanded="false" aria-controls="weapon-{{ $weapon->id }}">
                            {{ $weapon->name }} @if (count($weapon->chapter()->first()) > 0) {{ $weapon->chapter()->first()->name }} @endif
                        </a>
                    </b>                       
                </div>
                <div class="col-md-3">
                    <b>@if ($weapon->type) {{ $classes[$weapon->type] }} @else - @endif</b>
                </div>                   
                <div class="col-md-3">
                    <b>Damage:</b> @if ($weapon->dmg1 || $weapon->dmg3) {{ $weapon->dmg1 }}D{{ $weapon->dmg2 }} + {{ $weapon->dmg3 }}{{ strtoupper($weapon->dmg4) }} @else - @endif<br />
                </div>
                <div class="col-md-3">
                    <b>Pen:</b> {{ $weapon->pen }}<br />
                </div>
            </div>
            @if ($weapon->range)
            <div class="row">             
                <div class="col-md-offset-3 col-md-2">
                    <b>Range:</b> @if ($weapon->range) @if ($weapon->range_type == 0) {{ $weapon->range }}m @else SB x {{ $weapon->range }}@endif @else - @endif <br />
                </div>
                <div class="col-md-2">
                    <b>ROF:</b> @if ($weapon->rof1) S @else - @endif / @if ($weapon->rof2) {{ $weapon->rof2 }} @else - @endif / @if ($weapon->rof3) {{ $weapon->rof3 }} @else - @endif<br />
                </div>
                <div class="col-md-2">
                    <b>Clip:</b> @if ($weapon->clip) {{ $weapon->clip }} @else - @endif<br />
                </div>
                <div class="col-md-2">
                    <b>Reload:</b> @if ($weapon->rld) {{ $weapon->rld }} @else - @endif<br />
                </div>    
            </div>
            @endif
            <div class="row">
                <div class="col-md-offset-3 col-md-3">
                    <b>Weight</b> {{ $weapon->weight }}<br />
                </div>
                <div class="col-md-3">
                    <b>Requision</b> {{ $weapon->req }}<br />   
                </div>
                <div class="col-md-3">
                    <b>Renown</b> {{ $renow_levels[$weapon->renown] }}<br />
                </div>
            </div>                        
            
            <div class="collapse" id="weapon-{{ $weapon->id }}">
                <div class="well">    
                    @if (!isset($weapon_category)) 
                        <b>@if (count($weapon->category()->first()) > 0) {{ $weapon->category()->first()->name }} @else Uncategorized @endif</b><br /><br />
                    @endif
                    {!! nl2br(e($weapon->description)) !!}<br /><br />
                    @if (count($weapon->specialQualities()->first()) > 0)
                        <b>Special Qualities:</b>
                        @foreach ($weapon->specialQualities as $special_quality)
                             <a href="#" data-toggle="popoverload" data-id="{{ $special_quality->id }}" data-type="specialqualities">{{ $special_quality->name }}</a>
                             @if ($special_quality->extra)
                             ({{$special_quality->pivot->extra}})
                             @endif	    	 
                        @endforeach
                    @endif
                </div>
            </div>
        </div>   	  
    @endforeach
@endsection 
