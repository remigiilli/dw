@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="table-responsive"> 
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th>
	    <th>Name</th>	    
	    <th>Chapter</th>
            <th>Action</th>
            <th>Rank</th>
	    <td></td>
	    <td>
	      <a href="{{ route('admin.solomodeabilities.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($solo_mode_abilities as $solo_mode_ability)
	<tr>
	    <td>{{ $solo_mode_ability->id }}</td>
	    <td>{{ $solo_mode_ability->name }}</td>
            <td>@if (count($solo_mode_ability->chapter()->first()) > 0) {{ $solo_mode_ability->chapter()->first()->name }} @endif</td>
            <td>{{ $solo_mode_ability->action }}</td>
            <td>{{ $solo_mode_ability->rank }}</td>         
	    <td>
	      <a href="{{ route('admin.solomodeabilities.edit', $solo_mode_ability->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['admin.solomodeabilities.destroy', $solo_mode_ability->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
