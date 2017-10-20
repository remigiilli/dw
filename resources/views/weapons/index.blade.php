@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th>
	    <th>Name</th>	    
	    <th>Class</th>	
	    <th>Description</th>
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
	      <a href="{{ route('weapons.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($weapons as $weapon)
	<tr>
	    <td>{{ $weapon->id }}</td>
	    <td>{{ $weapon->name }}</td>
	    <td>	
@if ($weapon->type)		    
		{{ $classes[$weapon->type] }}
@else
		-
@endif
	    </td>	    	    
	    <td>	
		{{ $weapon->description }}
	    </td>	    
	    <td>
@if ($weapon->range)	    
		{{ $weapon->range }}
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
	      <a href="{{ route('weapons.edit', $weapon->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['weapons.destroy', $weapon->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
@endsection 
