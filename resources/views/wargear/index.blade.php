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
	    <th>Weight</th>	
	    <th>Requisition</th>	
	    <th>Renown</th>	
	    <td></td>
	    <td>
	      <a href="{{ route('admin.wargear.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($wargear as $wargear_item)
	<tr>
	    <td>{{ $wargear_item->id }}</td>
	    <td>{{ $wargear_item->name }} @if (count($wargear_item->chapter()->first()) > 0) [{{ $wargear_item->chapter()->first()->name }}] @endif</td>
            <td>@if (count($wargear_item->category()->first()) > 0) {{ $wargear_item->category()->first()->name }} @else - @endif</td>            
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
	      <a href="{{ route('admin.wargear.edit', $wargear_item->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['admin.wargear.destroy', $wargear_item->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
