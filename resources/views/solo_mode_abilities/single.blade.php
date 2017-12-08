<h3>{{ $solo_mode_ability->name }} @if (count($solo_mode_ability->chapter()->first()) > 0) ({{ $solo_mode_ability->chapter()->first()->name }}) @endif</h3>
  	
<p><b>Rank:</b> {!! nl2br(e($solo_mode_ability->rank)) !!}</p>
<p><b>Action:</b> {!! nl2br(e($solo_mode_ability->action)) !!}</p>
<p><b>Effect:</b> {!! nl2br(e($solo_mode_ability->effect)) !!}</p>
<p><b>Improvement:</b> {!! nl2br(e($solo_mode_ability->improvement)) !!}</p>
<p><a href="{{ route('admin.solomodeabilitiess.edit', $solo_mode_ability->id) }}">Edit</a></p>