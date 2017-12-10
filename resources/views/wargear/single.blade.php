<h3>{{ $wargear_item->name }} @if (count($wargear_item->chapter()->first()) > 0) {{ $wargear_item->chapter()->first()->name }} @endif</h3>
<p>@if (count($wargear_item->category()->first()) > 0) {{ $wargear_item->category()->first()->name }} @else Uncategorized @endif</p>
<p>{!! nl2br(e($wargear_item->description)) !!}</p>
<div class="row">
    <div class="col-lg-4">
	<b>Weight</b> {{ $wargear_item->weight }}<br />
    </div>
    <div class="col-lg-4">
	<b>Requision</b> {{ $wargear_item->req }}<br />   
    </div>
    <div class="col-lg-4">
	<b>Renown</b> {{ $renow_levels[$wargear_item->renown] }}<br />
    </div>
</div>
<p><a href="{{ route('admin.wargear.edit', $wargear_item->id) }}">Edit</a></p>
