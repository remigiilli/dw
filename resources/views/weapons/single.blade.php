<h3>{{ $weapon->name }}</h3>
<p>@if (count($weapon->category()->first()) > 0) {{ $weapon->category()->first()->name }} @else Uncategorized @endif</p>
<p><b>@if ($weapon->type) {{ $classes[$weapon->type] }} @else - @endif</b></p>
<p>{!! nl2br(e($weapon->description)) !!}</p>
<div class="row">
    <div class="col-lg-6">
	<b>Damage</b> @if ($weapon->dmg1 || $weapon->dmg3) {{ $weapon->dmg1 }}D{{ $weapon->dmg2 }} + {{ $weapon->dmg3 }} {{ $weapon->dmg4 }}@endif<br />
    </div>
    <div class="col-lg-6">
	<b>Pen</b> {{ $weapon->pen }}<br />
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
	<b>Range</b> @if ($weapon->range) @if ($weapon->range_type == 0) {{ $weapon->range }}m @else SB x {{ $weapon->range }}@endif @else - @endif <br />
    </div>
    <div class="col-lg-3">
	<b>ROF</b> @if ($weapon->rof1) S @else - @endif / @if ($weapon->rof2) {{ $weapon->rof2 }} @else - @endif / @if ($weapon->rof3) {{ $weapon->rof3 }} @else - @endif<br />
    </div>
    <div class="col-lg-3">
	<b>Clip</b> @if ($weapon->clip) {{ $weapon->clip }} @else - @endif<br />
    </div>
    <div class="col-lg-3">
	<b>Reload</b> @if ($weapon->rld) {{ $weapon->rld }} @else - @endif<br />
    </div>    
</div>
<div class="row">
    <div class="col-lg-4">
	<b>Weight</b> {{ $weapon->weight }}<br />
    </div>
    <div class="col-lg-4">
	<b>Requision</b> {{ $weapon->req }}<br />   
    </div>
    <div class="col-lg-4">
	<b>Renown</b> {{ $renow_levels[$weapon->renown] }}<br />
    </div>
</div>
@if (count($weapon->specialQualities()->first()) > 0)
    <p><b>Special Qualities:</b>
    @foreach ($weapon->specialQualities as $special_quality)
	 <a href="#" data-toggle="popoverload" data-id="{{ $special_quality->id }}" data-type="specialqualities">{{ $special_quality->name }}</a>
	 @if ($special_quality->extra)
	 ({{$special_quality->pivot->extra}})
	 @endif	    	 
    @endforeach</p>
@endif
<p><a href="{{ route('admin.weapons.edit', $weapon->id) }}">Edit</a></p>