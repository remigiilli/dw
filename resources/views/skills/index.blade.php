@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th>
	    <th>Group</th>
	    <th>Name</th>
	    <th>Attribute</th>
	    <th>Description</th>
	    <td></td>
	    <td>
	      <a href="{{ route('skills.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($skills as $skill)
	<tr>
	    <td>{{ $skill->id }}</td>    
	    <td>@if (count($skill->group()->first()) > 0) {{ $skill->group()->first()->name }} @endif</td>
	    <td>{{ $skill->name }}</td>
	    <td>{{ $attributes[$skill->attribute] }}</td>
	    <td>
		<p>{!! nl2br(e($skill->description)) !!}</p>
		@if ($skill->use) 
		<p><b>Skill Use:</b> {!! nl2br(e($skill->use)) !!}</p>
		@endif
		@if ($skill->special) 
		<p><b>Special Uses:</b><br /> {!! nl2br(e($skill->special)) !!}</p>
		@endif		
	    </td>
	    <td>
	      <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['skills.destroy', $skill->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
@endsection 
