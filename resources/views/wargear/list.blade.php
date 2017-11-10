@extends('layouts.app')

@section('title', '{{ $wargear_category->description }}')

@section('content')
    <h1>{{ $wargear_category->name }}</h1>
    <p>{{ $wargear_category->description }}</p>
    <div class="row">
        <div class="col-lg-3">            
            <strong>Name</strong>
        </div>
        <div class="col-lg-3">            
            <strong>Weight</strong>
        </div>            
        <div class="col-lg-3">    
            <strong>Requisition</strong>
        </div>
        <div class="col-lg-2">    
            <strong>Renown</strong>
        </div>
    </div>    
    @foreach ($wargear as $wargear_item)
	<div class="element">            
            <div class="row">
                <div class="col-lg-3">              
                    <b>
                        <a data-toggle="collapse" href="#wargear-item-{{ $wargear_item->id }}" aria-expanded="false" aria-controls="wargear-item-{{ $wargear_item->id }}">
                            {{ $wargear_item->name }}
                        </a>
                    </b>            
                </div>
                <div class="col-lg-3">  
                    {{ $wargear_item->weight }}
                </div>
                <div class="col-lg-3">   
                    {{ $wargear_item->req }}
                </div>
                <div class="col-lg-3">   
                    {{ $renow_levels[$wargear_item->renown] }}
                </div>
            </div>
            <div class="collapse" id="wargear-item-{{ $wargear_item->id }}">
                <div class="well">      
                    {!! nl2br(e($wargear_item->description)) !!}  
                </div>
            </div>
        </div>
    @endforeach
@endsection 
