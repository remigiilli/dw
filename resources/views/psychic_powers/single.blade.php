<h3>{{ $psychic_power->name }}</h3>
<p><b>Action</b> {{ $psychic_power->action }}</p>
<p><b>Opposed</b> @if ($psychic_power->opposed) Yes @else No @endif</p>
<p><b>Range</b> 
@if ($psychic_power->range_type == 0)	
    Self
@elseif ($psychic_power->range_type == 1)
    Touch
@elseif ($psychic_power->range_type == 2)
    {{ $psychic_power->range }} metres x PR
@elseif ($psychic_power->range_type == 3)
    {{ $psychic_power->range }} metres radius x PR
@else
    Special
@endif    
</p>  
<p><b>Sustained</b> @if ($psychic_power->sustained) Yes @else No @endif</p>
<p>{!! nl2br(e($psychic_power->description)) !!}</p>