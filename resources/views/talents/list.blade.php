@extends('layouts.app')

@section('title', 'Talents')

@section('content')
    <h1>Talents</h1>
    @foreach ($talents as $talent)
	<div>            
            <h4>
                <a data-toggle="collapse" href="#talent-{{ $talent->id }}" aria-expanded="false" aria-controls="talent-{{ $talent->id }}">
                    {{ $talent->name }}
                </a>
            </h4>            
            <div class="collapse" id="talent-{{ $talent->id }}">
              <div class="well">
                    @if ($talent->prerequisites) 
                        <p><b>Prerequisites:</b> {!! nl2br(e($talent->prerequisites)) !!}</p>
                    @endif

                    @if (count($talent->options()->first()) > 0)
                        <p><b>Talent Groups</b>: {{ implode(', ', $talent->options->lists('name')->all() ) }}</p>
                    @endif		
                    <p>{!! nl2br(e($talent->description)) !!}</p>
              </div>
            </div>
        </div>          
    @endforeach
@endsection 

