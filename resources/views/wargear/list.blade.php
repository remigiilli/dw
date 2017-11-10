@extends('layouts.app')

@section('title', '{{ $wargear_category->description }}')

@section('content')
    <h1>{{ $wargear_category->name }}</h1>
    <p>{{ $wargear_category->description }}</p>
    @foreach ($wargear as $wargear_item)
	<div>            
            <h4>
                <a data-toggle="collapse" href="#wargear-item-{{ $wargear_item->id }}" aria-expanded="false" aria-controls="wargear-item-{{ $wargear_item->id }}">
                    {{ $wargear_item->name }}
                </a>
            </h4>            
            <div class="collapse" id="wargear-item-{{ $wargear_item->id }}">
                <div class="well">      
                    <p>{!! nl2br(e($wargear_item->description)) !!}</p>
                    <div class="row">
                        <div class="col-lg-4">
                            <b>Weight</b> {{ $wargear_item->weight }}<br />
                        </div>
                        <div class="col-lg-4">
                            <b>Requision</b> {{ $wargear_item->req }}<br />   
                        </div>
                        <div class="col-lg-4">
                            <b>Renown</b> {{ $renow_levels[$wargear_item->renown] }}<br />
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    @endforeach
@endsection 
