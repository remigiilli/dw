@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="table-responsive"> 
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th>
	    <th>Name</th>	    
	    <th>Weight</th>	
	    <th>Requisition</th>	
	    <th>Renown</th>	
	    <td></td>
	    <td>
	      <a href="{{ route('wargear.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($wargear as $wargear_item)
	<tr>
	    <td>{{ $wargear_item->id }}</td>
	    <td>{{ $wargear_item->name }}</td>
	    <td>{{ $wargear_item->weight }}</td>
	    <td>
@if (!is_null($wargear_item->req))	    
		{{ $wargear_item->req }}
@else
		-
@endif	    
	    </td>
	    <td>{{ $renow_levels[$wargear_item->renown] }}</td>
	    <td>
	      <a href="{{ route('wargear.edit', $wargear_item->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['wargear.destroy', $wargear_item->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
