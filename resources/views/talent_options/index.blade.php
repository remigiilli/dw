@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th>
	    <th>Name</th>
	    <td></td>
	    <td>
	      <a href="{{ route('talentoptions.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($talent_options as $talent_option)
	<tr>
	    <td>{{ $talent_option->id }}</td>
	    <td>{{ $talent_option->name }}</td>
	    <td>
	      <a href="{{ route('talentoptions.edit', $talent_option->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['talentoptions.destroy', $talent_option->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
@endsection 
