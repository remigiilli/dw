<h3>{{ $weapon_category->name }}</h3>
<p>{{ $weapon_category->description }}</p>
<p><a href="{{ route('admin.weaponcategories.edit', $weapon_category->id) }}">Edit</a></p>