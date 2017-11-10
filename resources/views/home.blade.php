@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2><a href="{{ route('skills.listing') }}">Skills</a></h2>
                    <h2><a href="{{ route('talents.listing') }}">Talents</a></h2>
                    <h2><a href="{{ route('traits.listing') }}">Traits</a></h2>                    
                    <h2>Psychic Powers</h2>
                    <ul>
                    @foreach ($psychic_power_categories as $psychic_power_category)
                        <li><a href="{{ route('psychicpower.listing', $psychic_power_category->id) }}">{{ $psychic_power_category->name }}</a></li>
                    @endforeach
                    </ul>                      
                    
                    <h2>Wargear</h2>
                    <ul>
                    @foreach ($wargear_categories as $wargear_category)
                        <li><a href="{{ route('wargear.listing', $wargear_category->id) }}">{{ $wargear_category->name }}</a></li>
                    @endforeach
                    </ul>                    
                    
                    <h2>Weapons</h2>
                    <ul>
                    @foreach ($weapon_categories as $weapon_category)
                        <li><a href="{{ route('weapon.listing', $weapon_category->id) }}">{{ $weapon_category->name }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
