@extends('layouts.app')

@section('title', '{{ $weapon_category->name }}')

@section('content')
    <h1>{{ $weapon_category->name }}</h1>
    <p>{{ $weapon_category->description }}</p>
    @foreach ($weapons as $weapon)
	<div>            
            <h4>
                <a data-toggle="collapse" href="#weapon-{{ $weapon->id }}" aria-expanded="false" aria-controls="weapon-{{ $weapon->id }}">
                    {{ $weapon->name }}
                </a>
            </h4>            
            <div class="collapse" id="weapon-{{ $weapon->id }}">
                <div class="well">    
                    <p><b>{{ $classes[$weapon->type] }}</b></p>
                    <p>{!! nl2br(e($weapon->description)) !!}</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <b>Damage</b> {{ $weapon->dmg1 }}D{{ $weapon->dmg2 }} + {{ $weapon->dmg3 }} {{ $weapon->dmg4 }}<br />
                        </div>
                        <div class="col-lg-6">
                            <b>Pen</b> {{ $weapon->pen }}<br />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <b>Range</b> @if ($weapon->range) @if ($weapon->range_type == 0) {{ $weapon->range }}m @else SB x {{ $weapon->range }}@endif @else - @endif <br />
                        </div>
                        <div class="col-lg-3">
                            <b>ROF</b> @if ($weapon->rof1) S @else - @endif / @if ($weapon->rof2) {{ $weapon->rof2 }} @else - @endif / @if ($weapon->rof3) {{ $weapon->rof3 }} @else - @endif<br />
                        </div>
                        <div class="col-lg-3">
                            <b>Clip</b> @if ($weapon->clip) {{ $weapon->clip }} @else - @endif<br />
                        </div>
                        <div class="col-lg-3">
                            <b>Reload</b> @if ($weapon->rld) {{ $weapon->rld }} @else - @endif<br />
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <b>Weight</b> {{ $weapon->weight }}<br />
                        </div>
                        <div class="col-lg-4">
                            <b>Requision</b> {{ $weapon->req }}<br />   
                        </div>
                        <div class="col-lg-4">
                            <b>Renown</b> {{ $renow_levels[$weapon->renown] }}<br />
                        </div>
                    </div>
                    @if (count($weapon->specialQualities()->first()) > 0)
                        <p><b>Special Qualities:</b>
                        @foreach ($weapon->specialQualities as $special_quality)
                             <a href="#" data-toggle="popoverload" data-id="{{ $special_quality->id }}" data-type="specialqualities">{{ $special_quality->name }}</a>
                             @if ($special_quality->extra)
                             ({{$special_quality->pivot->extra}})
                             @endif	    	 
                        @endforeach</p>
                    @endif
                </div>
            </div>
        </div>   	  
    @endforeach
@endsection 
