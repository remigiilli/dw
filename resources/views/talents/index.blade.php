@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th>
	    <th>Name</th>	    
	    <th>Description</th>
	    <td></td>
	    <td>
	      <a href="{{ route('talents.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($talents as $talent)
	<tr>
	    <td>{{ $talent->id }}</td>
	    <td>{{ $talent->name }}</td>
	    <td>
@if (count($talent->options()->first()) > 0)
		<b>Talent Groups</b>: {{ implode(',', $talent->options->lists('name')->all() ) }}<br />
@endif		
		{!! nl2br(e($talent->description)) !!}
	    </td>
	    <td>
	      <a href="{{ route('talents.edit', $talent->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['talents.destroy', $talent->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
@endsection 
