<h3>{{ $user->name }}</h3>
<p>{{ $user->username }}</p>
<p>{{ $user->email }}</p>
<p>{{ $user->admin }}</p>
<p><a href="{{ route('admin.users.edit', $user->id) }}">Edit</a></p>