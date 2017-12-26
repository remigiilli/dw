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
                    <h2>Chapters</h2>
                    <ul>
                    @foreach ($chapters as $chapter)
                        <li><a href="{{ route('chapters.show', $chapter->id) }}">{{ $chapter->name }}</a></li>
                    @endforeach
                    </ul>                                            
                    
                    <h2>Specialities</h2>
                    <ul>
                    @foreach ($specialities as $speciality)
                        <li><a href="{{ route('specialities.show', $speciality->id) }}">{{ $speciality->name }}</a></li>
                    @endforeach
                    </ul>                                            
                    
                    
                    <h2><a href="{{ route('psychicpowers.listing') }}">Psychic Powers</a></h2>
                    <ul>
                    @foreach ($psychic_power_categories as $psychic_power_category)
                        <li><a href="{{ route('psychicpowers.categorylisting', $psychic_power_category->id) }}">{{ $psychic_power_category->name }}</a></li>
                    @endforeach
                    </ul>                      
                    
                    <h2><a href="{{ route('wargear.listing') }}">Wargear</a></h2>
                    <ul>
                    @foreach ($wargear_categories as $wargear_category)
                        <li><a href="{{ route('wargear.categorylisting', $wargear_category->id) }}">{{ $wargear_category->name }}</a></li>
                    @endforeach
                    </ul>                    
                    
                    <h2><a href="{{ route('weapons.listing') }}">Weapons</a></h2>
                    <ul>
                    @foreach ($weapon_categories as $weapon_category)
                        <li><a href="{{ route('weapons.categorylisting', $weapon_category->id) }}">{{ $weapon_category->name }}</a></li>
                    @endforeach
                    </ul>
                    
                    <h2>Character Advances</h2>
                    <ul>
                        <li><a href="{{ url('andee') }}">Andeee</a></li>
                        <li><a href="{{ url('garreth') }}">Garreth</a></li>
                        <li><a href="{{ url('joder') }}">Joder</a></li>
                        <li><a href="{{ url('mouse') }}">Mouse</a></li>
                        <li><a href="{{ url('zack') }}">Zack</a></li>                    
                    </ul>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
