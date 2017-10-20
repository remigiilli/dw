<h3>@if (count($skill->group()->first()) > 0) {{ $skill->group()->first()->name }} @endif{{ $skill->name }} ({{ $attributes[$skill->attribute] }})</h3>

@if (count($skill->group()->first()) > 0)
    <p>{!! nl2br(e($skill->group()->first()->description)) !!}</p>
@endif

<p>{!! nl2br(e($skill->description)) !!}</p>

@if ($skill->use) 
    <p><b>Skill Use:</b> {!! nl2br(e($skill->use)) !!}</p>
@elseif (count($skill->group()->first()) > 0 && $skill->group()->first()->use)
    <p><b>Skill Use:</b> {!! nl2br(e($skill->group()->first()->use)) !!}</p>
@endif

@if ($skill->special) 
    <p><b>Special Uses:</b><br /> {!! nl2br(e($skill->special)) !!}</p>
@elseif (count($skill->group()->first()) > 0 && $skill->group()->first()->special)
    <p><b>Special Uses:</b><br />  {!! nl2br(e($skill->group()->first()->special)) !!}</p>
@endif
