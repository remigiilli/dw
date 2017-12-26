<div>
    <h3>{{ $chapter->name }}</h3>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#panel-general" aria-controls="panel-general" role="tab" data-toggle="tab">Creation, Curse and Demeanour</a></li>
        <li role="presentation"><a href="#panel-psychic-powers" aria-controls="panel-psychic-powers" role="tab" data-toggle="tab">Psychic Powers</a></li>
        <li role="presentation"><a href="#panel-mode-abilities" aria-controls="panel-mode-abilities" role="tab" data-toggle="tab">Solo and Squad Mode Abilities</a></li>
        <li role="presentation"><a href="#panel-weapons" aria-controls="panel-weapons" role="tab" data-toggle="tab">Weapons</a></li>
        <li role="presentation"><a href="#panel-wargear" aria-controls="panel-general" role="tab" data-toggle="tab">Wargear</a></li>
        <li role="presentation"><a href="#panel-advances" aria-controls="panel-advances" role="tab" data-toggle="tab">Chapter Advances</a></li>            
    </ul>  	
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="panel-general">
            <h4>{{ $chapter->name }} Character Creation:</h4>
            <p>{!! nl2br(e($chapter->creation)) !!}</p>
            <h4>{{ $chapter->name }} Demeanour: {{ $chapter->demeanour_title }}</h4>
            <p>{!! nl2br(e($chapter->demeanour_description)) !!}</p>
            <h4>{{ $chapter->name }} Primarchs Curse: {{ $chapter->curse_title }}</h4>
            <p>{!! nl2br(e($chapter->curse_description)) !!}</p>
            <p><a href="{{ route('admin.chapters.edit', $chapter->id) }}">Edit</a></p>
        </div>        
        <div role="tabpanel" class="tab-pane" id="panel-psychic-powers">
            @if (count($chapter->psychicPowers()->first()) > 0)   
                @foreach ($chapter->psychicPowers as $psychic_power)
                    <div class="element">   
                        <div class="row">
                            <div class="col-md-3">            
                                <b>
                                    <a data-toggle="collapse" href="#psychic-powers-{{ $psychic_power->id }}" aria-expanded="false" aria-controls="psychic-powers-{{ $psychic_power->id }}">
                                        {{ $psychic_power->name }}
                                    </a>
                                </b>            
                            </div>
                            <div class="col-md-3">
                                @if (!$psychic_power->action)	
                                    Free
                                @elseif ($psychic_power->action == 0.5)
                                    Half
                                @elseif ($psychic_power->action > 1)
                                    extended ({{ $psychic_power->action }})
                                @else
                                     {{ $psychic_power->action }}
                                @endif
                            </div>
                            <div class="col-md-2">
                                @if ($psychic_power->opposed) Yes @else No @endif
                            </div>
                            <div class="col-md-2">
                                @if ($psychic_power->range_type == 0)	
                                    Self
                                @elseif ($psychic_power->range_type == 1)
                                    Touch
                                @elseif ($psychic_power->range_type == 2)
                                    {{ $psychic_power->range }} metres x PR
                                @elseif ($psychic_power->range_type == 3)
                                    {{ $psychic_power->range }} metres radius x PR
                                @elseif ($psychic_power->range_type == 5)
                                    {{ $psychic_power->range }} metres
                                @elseif ($psychic_power->range_type == 6)
                                    {{ $psychic_power->range }} metres + PR
                                @elseif ($psychic_power->range_type == 7)
                                    {{ $psychic_power->range }}d10 metres x PR    
                                @else
                                    Special
                                @endif                        
                            </div>                
                            <div class="col-md-2">
                                @if ($psychic_power->sustained) Yes @else No @endif
                            </div>                                              
                        </div>
                        <div class="collapse" id="psychic-powers-{{ $psychic_power->id }}">
                            <div class="well">    
                                @if (!isset($psychic_power_category))
                                    <b>@if (count($psychic_power->category()->first()) > 0) {{ $psychic_power->category()->first()->name }} @else Uncategorized @endif</b><br/><br/>
                                @endif
                                {!! nl2br(e($psychic_power->description)) !!}   
                            </div>
                        </div>
                    </div>                      
                @endforeach        
            @endif
        </div>
        <div role="tabpanel" class="tab-pane" id="panel-mode-abilities">
            @if (count($chapter->soloModeAbilities()->first()) > 0)   
                <h4>{{ $chapter->name }} Solo Mode Abilities</h4>
                @foreach ($chapter->soloModeAbilities as $solo_mode_ability)
                    <div>            
                        <h4>
                            <a data-toggle="collapse" href="#solo_mode_ability-{{ $solo_mode_ability->id }}" aria-expanded="false" aria-controls="solo_mode_ability-{{ $solo_mode_ability->id }}">
                                {{ $solo_mode_ability->name }}
                            </a>
                        </h4>            
                        <div class="collapse" id="solo_mode_ability-{{ $solo_mode_ability->id }}">
                          <div class="well">		
                                <p><b>Rank:</b> {!! nl2br(e($solo_mode_ability->rank)) !!}</p>
                                <p><b>Action:</b> {!! nl2br(e($solo_mode_ability->action)) !!}</p>
                                <p><b>Effect:</b> {!! nl2br(e($solo_mode_ability->effect)) !!}</p>
                                <p><b>Improvement:</b> {!! nl2br(e($solo_mode_ability->improvement)) !!}</p>
                          </div>
                        </div>
                    </div>          
                @endforeach   
            @endif 
            @if (count($chapter->squadModeAbilities()->first()) > 0) 
                <h4>{{ $chapter->name }} Squad Mode Abilities</h4>
                @foreach ($chapter->squadModeAbilities as $squad_mode_ability)
                    <div>            
                        <h4>
                            <a data-toggle="collapse" href="#squad_mode_ability-{{ $squad_mode_ability->id }}" aria-expanded="false" aria-controls="squad_mode_ability-{{ $squad_mode_ability->id }}">
                                {{ $squad_mode_ability->name }}
                            </a>
                        </h4>            
                        <div class="collapse" id="squad_mode_ability-{{ $squad_mode_ability->id }}">
                          <div class="well">		
                                <p><b>Cost:</b> {!! nl2br(e($squad_mode_ability->cost)) !!}</p>
                                <p><b>Action:</b> {!! nl2br(e($squad_mode_ability->action)) !!}</p>
                                <p><b>Sustained:</b> @if ($squad_mode_ability->sustained) Yes @else No @endif</p>
                                <p><b>Effect:</b> {!! nl2br(e($squad_mode_ability->effect)) !!}</p>
                                <p><b>Improvement:</b> {!! nl2br(e($squad_mode_ability->improvement)) !!}</p>
                          </div>
                        </div>
                    </div>          
                @endforeach     
            @endif 
        </div>
        <div role="tabpanel" class="tab-pane" id="panel-weapons">
            @if (count($chapter->weapons()->first()) > 0)   
                @foreach ($chapter->weapons as $weapon)
                    <div class="element">                        
                        <div class="row">
                            <div class="col-md-3">
                                <b>
                                    <a data-toggle="collapse" href="#weapon-{{ $weapon->id }}" aria-expanded="false" aria-controls="weapon-{{ $weapon->id }}">
                                        {{ $weapon->name }} @if (count($weapon->chapter()->first()) > 0) {{ $weapon->chapter()->first()->name }} @endif
                                    </a>
                                </b>                       
                            </div>
                            <div class="col-md-3">
                                <b>@if ($weapon->type) {{ $classes[$weapon->type] }} @else - @endif</b>
                            </div>                   
                            <div class="col-md-3">
                                <b>Damage:</b> @if ($weapon->dmg1 || $weapon->dmg3) {{ $weapon->dmg1 }}D{{ $weapon->dmg2 }} + {{ $weapon->dmg3 }}{{ strtoupper($weapon->dmg4) }} @else - @endif<br />
                            </div>
                            <div class="col-md-3">
                                <b>Pen:</b> {{ $weapon->pen }}<br />
                            </div>
                        </div>
                        @if ($weapon->range)
                        <div class="row">             
                            <div class="col-md-offset-3 col-md-2">
                                <b>Range:</b> @if ($weapon->range) @if ($weapon->range_type == 0) {{ $weapon->range }}m @else SB x {{ $weapon->range }}@endif @else - @endif <br />
                            </div>
                            <div class="col-md-2">
                                <b>ROF:</b> @if ($weapon->rof1) S @else - @endif / @if ($weapon->rof2) {{ $weapon->rof2 }} @else - @endif / @if ($weapon->rof3) {{ $weapon->rof3 }} @else - @endif<br />
                            </div>
                            <div class="col-md-2">
                                <b>Clip:</b> @if ($weapon->clip) {{ $weapon->clip }} @else - @endif<br />
                            </div>
                            <div class="col-md-2">
                                <b>Reload:</b> @if ($weapon->rld) {{ $weapon->rld }} @else - @endif<br />
                            </div>    
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-offset-3 col-md-3">
                                <b>Weight</b> {{ $weapon->weight }}<br />
                            </div>
                            <div class="col-md-3">
                                <b>Requision</b> {{ $weapon->req }}<br />   
                            </div>
                            <div class="col-md-3">
                                <b>Renown</b> {{ $renow_levels[$weapon->renown] }}<br />
                            </div>
                        </div>                        

                        <div class="collapse" id="weapon-{{ $weapon->id }}">
                            <div class="well">    
                                @if (!isset($weapon_category)) 
                                    <b>@if (count($weapon->category()->first()) > 0) {{ $weapon->category()->first()->name }} @else Uncategorized @endif</b><br /><br />
                                @endif
                                {!! nl2br(e($weapon->description)) !!}<br /><br />
                                @if (count($weapon->specialQualities()->first()) > 0)
                                    <b>Special Qualities:</b>
                                    @foreach ($weapon->specialQualities as $special_quality)
                                         <a href="#" data-toggle="popoverload" data-id="{{ $special_quality->id }}" data-type="specialqualities">{{ $special_quality->name }}</a>
                                         @if ($special_quality->extra)
                                         ({{$special_quality->pivot->extra}})
                                         @endif	    	 
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>   	  
                @endforeach        
            @endif
        </div>
        <div role="tabpanel" class="tab-pane" id="panel-wargear">
            @if (count($chapter->wargear()->first()) > 0)
                <div class="row">        
                    <div class="col-md-3">            
                        <strong>Name</strong>
                    </div>
                    <div class="col-md-3">            
                        <strong>Weight</strong>
                    </div>            
                    <div class="col-md-3">    
                        <strong>Requisition</strong>
                    </div>
                    <div class="col-md-3">    
                        <strong>Renown</strong>
                    </div>
                </div>        
                @foreach ($chapter->wargear as $wargear_item)
                    <div class="element">
                        @if (isset($wargear_category) && $wargear_category->id === 8)
                            <b>
                                <a data-toggle="collapse" href="#wargear-item-{{ $wargear_item->id }}" aria-expanded="false" aria-controls="wargear-item-{{ $wargear_item->id }}">
                                    {{ $wargear_item->name }} @if (count($wargear_item->chapter()->first()) > 0) {{ $wargear_item->chapter()->first()->name }} @endif
                                </a>
                            </b>     
                        @elseif (isset($wargear_category) && in_array($wargear_category->id, array(3, 4, 5, 6, 7)))
                            <div class="row">
                                <div class="col-md-4">              
                                    <b>
                                        <a data-toggle="collapse" href="#wargear-item-{{ $wargear_item->id }}" aria-expanded="false" aria-controls="wargear-item-{{ $wargear_item->id }}">
                                            {{ $wargear_item->name }}
                                        </a>
                                    </b>            
                                </div>
                                <div class="col-md-4">   
                                    {{ $wargear_item->req }}
                                </div>
                                <div class="col-md-4">   
                                    {{ $renow_levels[$wargear_item->renown] }}
                                </div>
                            </div>            
                        @else                    
                            <div class="row">
                                <div class="col-md-3">              
                                    <b>
                                        <a data-toggle="collapse" href="#wargear-item-{{ $wargear_item->id }}" aria-expanded="false" aria-controls="wargear-item-{{ $wargear_item->id }}">
                                            {{ $wargear_item->name }}
                                        </a>
                                    </b>            
                                </div>
                                <div class="col-md-3">  
                                    {{ $wargear_item->weight }}
                                </div>
                                <div class="col-md-3">   
                                    {{ $wargear_item->req }}
                                </div>
                                <div class="col-md-3">   
                                    {{ $renow_levels[$wargear_item->renown] }}
                                </div>
                            </div>
                        @endif
                        <div class="collapse" id="wargear-item-{{ $wargear_item->id }}">
                            <div class="well">      
                                @if (!isset($wargear_category))
                                    <b>@if (count($wargear_item->category()->first()) > 0) {{ $wargear_item->category()->first()->name }} @else Uncategorized @endif</b><br /><br />
                                @endif    
                                {!! nl2br(e($wargear_item->description)) !!}  
                            </div>
                        </div>
                    </div>
                @endforeach  
            @endif
        </div>
        <div role="tabpanel" class="tab-pane" id="panel-advances">        
            @if (count($chapter->skillAdvances()->first()) > 0)   
                <table  class="table table-striped">
                  <thead>    
                    <tr>
                        <th>Skill</th>	    
                        <th>Cost</th>
                        <th>Prerequisites</th>
                    </tr>
                  </thead>
                  <tbody>        
                @foreach ($chapter->skillAdvances as $skill)
                <tr>
                    <td><a href="#" data-toggle="popoverload" data-id="{{ $skill->id }}" data-type="skills" data-placement="auto">{{$skill->name}}</a> @if($skill->pivot->proficeincy) +{{$skill->pivot->proficeincy}} @endif</td>
                    <td>{{$skill->pivot->cost}}</td>
                    <td>
                        @if($skill->pivot->proficeincy == 10)
                            {{$skill->name}}
                        @elseif($skill->pivot->proficeincy == 20)
                            {{$skill->name}} +10
                        @endif                
                    </td>
                </tr>
                @endforeach                       
                    </tbody>
                </table>            
            @endif      

            @if (count($chapter->talentAdvances()->first()) > 0)   
                <table  class="table table-striped">
                  <thead>    
                    <tr>
                        <th>Talent</th>	    
                        <th>Cost</th>
                        <th>Prerequisites</th>
                    </tr>
                  </thead>
                  <tbody>        
                @foreach ($chapter->talentAdvances as $talent)
                <tr>
                    <td><a href="#" data-toggle="popoverload" data-id="{{ $talent->id }}" data-type="talents" data-placement="auto">{{$talent->name}}</a> @if($talent->pivot->talent_option_id) {{$talent->pivot->talent_option_id}} @endif</td>
                    <td>{{$talent->pivot->cost}}</td>
                    <td>{{$talent->prerequisites}}</td>
                </tr>
                @endforeach                       
                    </tbody>
                </table>            
            @endif           
        </div>    
    </div>
</div>    