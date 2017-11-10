<h3>{{ $trait->name }}</h3>
<p>{{ $trait->description }}</p>
<p><a href="{{ route('admin.traits.edit', $trait->id) }}">Edit</a></p>