<h3>{{ $skill_group->name }}</h3>
@if (count($skill_group->skills()->first()) > 0)
    <p><b>Skill Groups</b>: {{ implode(', ', $skill_group->skills->lists('name')->all() ) }}</p>
@endif	
<p>{{ $skill_group->description }}</p>