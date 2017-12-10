@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="table-responsive"> 
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th>
	    <th>Name</th>	    
            <th>Category</th>	
	    <th>Class</th>	
	    <th>Range</th>
	    <th>ROF</th>
	    <th>Damage</th>
	    <th>Pen</th>
	    <th>Clip</th>
	    <th>Rld</th>
	    <th>Weight</th>	
	    <th>Requisition</th>	
	    <th>Renown</th>	
	    <td></td>
	    <td>
	      <a href="{{ route('admin.weapons.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($weapons as $weapon)
	<tr>
	    <td>{{ $weapon->id }} @if (count($weapon->chapter()->first()) > 0) {{ $weapon->chapter()->first()->name }} @endif</td>
	    <td>{{ $weapon->name }}</td>
	    <td>@if (count($weapon->category()->first()) > 0) {{ $weapon->category()->first()->name }} @else - @endif</td>            
	    <td>	
@if ($weapon->type)		    
		{{ $classes[$weapon->type] }}
@else
		-
@endif
	    </td>	    	    	    
	    <td>
@if ($weapon->range)	 
    @if ($weapon->range_type == 0)	
        {{ $weapon->range }}m
    @else
        SB X {{ $weapon->range }}
    @endif    
@else
		-
@endif	    
	    </td>
	    <td>
@if ($weapon->rof1)	    
		S
@else
		-
@endif	   
		/
@if ($weapon->rof2)	    
		{{ $weapon->rof2 }}
@else
		-
@endif	   
		/
@if ($weapon->rof3)	    
		{{ $weapon->rof3 }}
@else
		-
@endif	   		
	    </td>
	    <td>
		{{ $weapon->dmg1 }}D{{ $weapon->dmg2 }} + {{ $weapon->dmg3 }} {{ $weapon->dmg4 }}
	    </td>
	    <td>{{ $weapon->pen }}</td>
	    <td>
@if ($weapon->clip)	    
		{{ $weapon->clip }}
@else
		-
@endif
	    </td>
	    <td>
@if ($weapon->rld)	    
		{{ $weapon->rld }}
@else
		-
@endif
	    </td>
	    <td>{{ $weapon->weight }}</td>
	    <td>
@if (!is_null($weapon->req))	    
		{{ $weapon->req }}
@else
		-
@endif	    
	    </td>
	    <td>{{ $renow_levels[$weapon->renown] }}</td>
	    <td>
@if (count($weapon->specialQualities()->first()) > 0)
    @foreach ($weapon->specialQualities as $special_quality)
	 {{ $special_quality->name }}@if ($special_quality->extra)({{$special_quality->pivot->extra}})@endif,
    @endforeach
@endif	    		    
	    </td>
	    <td>
	      <a href="{{ route('admin.weapons.edit', $weapon->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['admin.weapons.destroy', $weapon->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
