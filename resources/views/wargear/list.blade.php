@extends('layouts.app')

@section('title', 'Wargear')

@section('content')
    @if (isset($wargear_category))
        <h1>{{ $wargear_category->name }}</h1>
        <p>{{ $wargear_category->description }}</p>
    @else 
        <h1>Wargear</h1> 
    @endif
    @if (!isset($wargear_category) || $wargear_category->id !== 8)
        @if (isset($wargear_category) && in_array($wargear_category->id, array(3, 4, 5, 6, 7)))
        <div class="row">        
            <div class="col-md-4">            
                <strong>Name</strong>
            </div>           
            <div class="col-md-4">    
                <strong>Requisition</strong>
            </div>
            <div class="col-md-4">    
                <strong>Renown</strong>
            </div>
        </div>                   
        @else
        <div class="row">        
            <div class="col-md-3">            
                <strong>Name</strong>
            </div>
            <div class="col-md-3">            
                <strong>Weight</strong>
            </div>            
            <div class="col-md-3">    
                <strong>Requisition</strong>
            </div>
            <div class="col-md-3">    
                <strong>Renown</strong>
            </div>
        </div>
        @endif
    @endif
    @foreach ($wargear as $wargear_item)
	<div class="element">
            @if (isset($wargear_category) && $wargear_category->id === 8)
                <b>
                    <a data-toggle="collapse" href="#wargear-item-{{ $wargear_item->id }}" aria-expanded="false" aria-controls="wargear-item-{{ $wargear_item->id }}">
                        {{ $wargear_item->name }} @if (count($wargear_item->chapter()->first()) > 0) {{ $wargear_item->chapter()->first()->name }} @endif
                    </a>
                </b>     
            @elseif (isset($wargear_category) && in_array($wargear_category->id, array(3, 4, 5, 6, 7)))
                <div class="row">
                    <div class="col-md-4">              
                        <b>
                            <a data-toggle="collapse" href="#wargear-item-{{ $wargear_item->id }}" aria-expanded="false" aria-controls="wargear-item-{{ $wargear_item->id }}">
                                {{ $wargear_item->name }}
                            </a>
                        </b>            
                    </div>
                    <div class="col-md-4">   
                        {{ $wargear_item->req }}
                    </div>
                    <div class="col-md-4">   
                        {{ $renow_levels[$wargear_item->renown] }}
                    </div>
                </div>            
            @else                    
                <div class="row">
                    <div class="col-md-3">              
                        <b>
                            <a data-toggle="collapse" href="#wargear-item-{{ $wargear_item->id }}" aria-expanded="false" aria-controls="wargear-item-{{ $wargear_item->id }}">
                                {{ $wargear_item->name }}
                            </a>
                        </b>            
                    </div>
                    <div class="col-md-3">  
                        {{ $wargear_item->weight }}
                    </div>
                    <div class="col-md-3">   
                        {{ $wargear_item->req }}
                    </div>
                    <div class="col-md-3">   
                        {{ $renow_levels[$wargear_item->renown] }}
                    </div>
                </div>
            @endif
            <div class="collapse" id="wargear-item-{{ $wargear_item->id }}">
                <div class="well">      
                    @if (!isset($wargear_category))
                        <b>@if (count($wargear_item->category()->first()) > 0) {{ $wargear_item->category()->first()->name }} @else Uncategorized @endif</b><br /><br />
                    @endif    
                    {!! nl2br(e($wargear_item->description)) !!}  
                </div>
            </div>
        </div>
    @endforeach
@endsection 
