@extends('layouts.app')

@section('title', 'Talents')

@section('content')
    <h1>Chapters</h1>
    @foreach ($chapters as $chapter)
	<div>            
            <h4>
                <a data-toggle="collapse" href="#chapter-{{ $chapter->id }}" aria-expanded="false" aria-controls="chapter-{{ $chapter->id }}">
                    {{ $chapter->name }}
                </a>
            </h4>            
            <div class="collapse" id="chapter-{{ $chapter->id }}">
              <div class="well">		
                    <p>{!! nl2br(e($chapter->creation)) !!}</p>
                    <h5>{{ $chapter->demeanour_title }}</h5>
                    <p>{!! nl2br(e($chapter->demeanour_description)) !!}</p>
                    <h5>{{ $chapter->curse_title }}</h5>
                    <p>{!! nl2br(e($chapter->curse_description)) !!}</p>
              </div>
            </div>
        </div>          
    @endforeach
@endsection 

