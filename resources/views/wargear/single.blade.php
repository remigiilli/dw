<h3>{{ $wargear->name }}</h3>
<p>{!! nl2br(e($wargear->description)) !!}</p>
<div class="row">
    <div class="col-lg-4">
	<b>Weight</b> {{ $wargear->weight }}<br />
    </div>
    <div class="col-lg-4">
	<b>Requision</b> {{ $wargear->req }}<br />   
    </div>
    <div class="col-lg-4">
	<b>Renown</b> {{ $renow_levels[$wargear->renown] }}<br />
    </div>
</div>
