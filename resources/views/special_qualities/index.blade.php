@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="table-responsive"> 
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th>
	    <th>Name</th>
	    <th>Description</th>
	    <th>Additional Value</th>
	    <td></td>
	    <td>
	      <a href="{{ route('admin.specialqualities.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($special_qualities as $special_quality)
	<tr>
	    <td>{{ $special_quality->id }}</td>
	    <td>{{ $special_quality->name }}</td>
	    <td>{!! nl2br(e($special_quality->description)) !!}</td>
	    <td>{{ $special_quality->extra }}</td>
	    <td>
	      <a href="{{ route('admin.specialqualities.edit', $special_quality->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    	    
	    <td>
	      {{ Form::open(['route' => ['admin.specialqualities.destroy', $special_quality->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
