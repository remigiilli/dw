@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="table-responsive"> 
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th><th>Name</th><th>Description</th><td></td>
	    <td>
	      <a href="{{ route('wargearcategories.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($wargear_categories as $wargear_category)
	<tr>
	    <td>{{ $wargear_category->id }}</td>
	    <td>{{ $wargear_category->name }}</td>
	    <td>{!! nl2br(e($wargear_category->description))!!}</td>
	    <td>
	      <a href="{{ route('wargearcategories.edit', $wargear_category->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['wargearcategories.destroy', $wargear_category->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
