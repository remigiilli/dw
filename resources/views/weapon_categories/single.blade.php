<h3>{{ $weapon_category->name }}</h3>
<p>{{ $weapon_category->description }}
<p><a href="{{ route('weaponcategories.edit', $weapon_category->id) }}">Edit</a></p></p>