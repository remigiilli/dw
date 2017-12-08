<h3>{{ $special_ability->name }} @if (count($special_ability->speciality()->first()) > 0) ({{ $special_ability->speciality()->first()->name }}) @endif</h3>

<p>{!! nl2br(e($special_ability->description)) !!}</p>
<p><a href="{{ route('admin.specialabilities.edit', $special_ability->id) }}">Edit</a></p>