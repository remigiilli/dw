<h3>{{ $speciality->name }}</h3>

@if (count($speciality->specialAbilities()->first()) > 0)
    <b>Special Abilities:</b>
    @foreach ($speciality->specialAbilities as $special_ability)
         <a href="#" data-toggle="popoverload" data-id="{{ $special_ability->id }}" data-type="specialabilities">{{ $special_ability->name }}</a> 	 
    @endforeach
@endif

<p><a href="{{ route('admin.specialities.edit', $speciality->id) }}">Edit</a></p>