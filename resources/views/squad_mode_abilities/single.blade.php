<h3>{{ $squad_mode_ability->name }} @if (count($squad_mode_ability->chapter()->first()) > 0) ({{ $squad_mode_ability->chapter()->first()->name }}) @endif</h3>
  	
<p><b>Cost:</b> {!! nl2br(e($squad_mode_ability->cost)) !!}</p>
<p><b>Action:</b> {!! nl2br(e($squad_mode_ability->action)) !!}</p>
<p><b>Sustained:</b> @if ($squad_mode_ability->sustained) Yes @else No @endif</p>
<p><b>Effect:</b> {!! nl2br(e($squad_mode_ability->effect)) !!}</p>
<p><b>Improvement:</b> {!! nl2br(e($squad_mode_ability->improvement)) !!}</p>
<p><a href="{{ route('admin.squadmodeabilitiess.edit', $squad_mode_ability->id) }}">Edit</a></p>