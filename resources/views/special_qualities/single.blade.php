<h3>{{ $special_quality->name }}</h3>
<p>{{ $special_quality->description }}</p>   
<p><a href="{{ route('admin.specialqualities.edit', $special_quality->id) }}">Edit</a></p>