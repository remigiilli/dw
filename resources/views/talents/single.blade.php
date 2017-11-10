<h3>{{ $talent->name }}</h3>
  
@if ($talent->prerequisites) 
    <p><b>Prerequisites:</b> {!! nl2br(e($talent->prerequisites)) !!}</p>
@endif

@if (count($talent->options()->first()) > 0)
    <p><b>Talent Groups</b>: {{ implode(', ', $talent->options->lists('name')->all() ) }}</p>
@endif		
<p>{!! nl2br(e($talent->description)) !!}</p>
<p><a href="{{ route('admin.talents.edit', $talent->id) }}">Edit</a></p>