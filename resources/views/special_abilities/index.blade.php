@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="table-responsive"> 
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th>
	    <th>Name</th>	    
            <th>Speciality</th>	    
            <th>Description</th>	    
	    <td></td>
	    <td>
	      <a href="{{ route('admin.specialabilities.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($special_abilities as $special_ability)
	<tr>
	    <td>{{ $special_ability->id }}</td>
	    <td>{{ $special_ability->name }}</td>
            <td>@if (count($special_ability->speciality()->first()) > 0) {{ $special_ability->speciality()->first()->name }} @endif</td>
            <td>{{ $special_ability->description }}</td>     
	    <td>
	      <a href="{{ route('admin.specialabilities.edit', $special_ability->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['admin.specialabilities.destroy', $special_ability->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
