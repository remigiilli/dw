@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="table-responsive"> 
    <table  class="table table-striped">
      <thead>    
	<tr>
	    <th>ID</th>
	    <th>Name</th>	    	   	    	    
            <th>Category</th>	
	    <th>Action</th>
	    <th>Opposed</th>
            <th>Range</th>
	    <th>Sustained</th>
	    <td></td>
	    <td>
	      <a href="{{ route('psychicpowers.create') }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-plus"></span> Add
	      </a>	    
	    </td>
	</tr>
      </thead>
      <tbody>
    @foreach ($psychic_powers as $psychic_power)
	<tr>
	    <td>{{ $psychic_power->id }}</td>
	    <td>{{ $psychic_power->name }}</td>
            <td>@if (count($psychic_power->category()->first()) > 0) {{ $psychic_power->category()->first()->name }} @else - @endif</td>               
            <td>{{ $psychic_power->action }}</td>	
            <td>@if ($psychic_power->opposed) Yes @else No @endif</td>	    	    	    
	    <td>
                @if ($psychic_power->range_type == 0)	
                    Self
                @elseif ($psychic_power->range_type == 1)
                    Touch
                @elseif ($psychic_power->range_type == 2)
                    {{ $psychic_power->range }}m x PR
                @elseif ($psychic_power->range_type == 3)
                    {{ $psychic_power->range }}m radius x PR
                @else
                    Special
                @endif    
	    </td>
            <td>@if ($psychic_power->sustained) Yes @else No @endif</td>	   
	    <td>
	      <a href="{{ route('psychicpowers.edit', $psychic_power->id) }}" class="btn btn-info btn-sm">
		<span class="glyphicon glyphicon-edit"></span> Edit
	      </a>
	    </td>	    
	    <td>
	      {{ Form::open(['route' => ['psychicpowers.destroy', $psychic_power->id], 'method' => 'delete']) }}
		<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-trash"></span> Trash</button>
	      {{ Form::close() }}
	    </td>
	</tr>      
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
