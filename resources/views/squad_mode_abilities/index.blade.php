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
            <th>Sustained</th>
            <th>Cost</th>
	    <td></td>
	    <td>
	      <a href="{{ route('admin.squadmodeabilities.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($squad_mode_abilities as $squad_mode_ability)
	<tr>
	    <td>{{ $squad_mode_ability->id }}</td>
	    <td>{{ $squad_mode_ability->name }}</td>
            <td>@if (count($squad_mode_ability->chapter()->first()) > 0) {{ $squad_mode_ability->chapter()->first()->name }} @endif</td>
            <td>{{ $squad_mode_ability->action }}</td>
            <td>@if ($squad_mode_ability->sustained) Yes @else No @endif</td>
            <td>{{ $squad_mode_ability->cost }}</td>         
	    <td>
	      <a href="{{ route('admin.squadmodeabilities.edit', $squad_mode_ability->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['admin.squadmodeabilities.destroy', $squad_mode_ability->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
