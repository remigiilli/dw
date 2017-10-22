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
	    <td></td>
	    <td>
	      <a href="{{ route('skillgroups.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($skill_groups as $skill_group)
	<tr>
	    <td>{{ $skill_group->id }}</td>
	    <td>{{ $skill_group->name }}</td>
	    <td>
		<p>{!! nl2br(e($skill_group->description)) !!}</p>
		@if ($skill_group->use) 
		<p><b>Skill Use:</b> {!! nl2br(e($skill_group->use)) !!}</p>
		@endif
		@if ($skill_group->special) 
		<p><b>Special Uses:</b><br /> {!! nl2br(e($skill_group->special)) !!}</p>
		@endif			
	    </td>
	    <td>
	      <a href="{{ route('skillgroups.edit', $skill_group->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['skillgroups.destroy', $skill_group->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
