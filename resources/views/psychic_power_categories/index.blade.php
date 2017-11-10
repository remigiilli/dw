@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="table-responsive"> 
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th><th>Name</th><td></td>
	    <td>
	      <a href="{{ route('admin.psychicpowercategories.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($psychic_power_categories as $psychic_power_category)
	<tr>
	    <td>{{ $psychic_power_category->id }}</td>
	    <td>{{ $psychic_power_category->name }}</td>
	    <td>
	      <a href="{{ route('admin.psychicpowercategories.edit', $psychic_power_category->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['admin.psychicpowercategories.destroy', $psychic_power_category->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
