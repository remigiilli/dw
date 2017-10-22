@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="table-responsive"> 
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th><th>Name</th><th>Description</th><td></td>
	    <td>
	      <a href="{{ route('weaponcategories.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($weapon_categories as $weapon_category)
	<tr>
	    <td>{{ $weapon_category->id }}</td>
	    <td>{{ $weapon_category->name }}</td>
	    <td>{!! nl2br(e($weapon_category->description))!!}</td>
	    <td>
	      <a href="{{ route('weaponcategories.edit', $weapon_category->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['weaponcategories.destroy', $weapon_category->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
