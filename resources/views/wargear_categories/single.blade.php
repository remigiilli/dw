<h3>{{ $wargear_category->name }}</h3>
<p>{{ $wargear_category->description }}
<p><a href="{{ route('admin.wargearcategories.edit', $wargear_category->id) }}">Edit</a></p></p>