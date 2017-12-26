<div>
    <h3>{{ $speciality->name }}</h3>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#panel-general" aria-controls="panel-general" role="tab" data-toggle="tab">Creation</a></li>
        <li role="presentation"><a href="#panel-advances" aria-controls="panel-advances" role="tab" data-toggle="tab">Speciality Advances</a></li>            
    </ul>  
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="panel-general">
            @if (count($speciality->specialAbilities()->first()) > 0)
                <b>Special Abilities:</b>
                @foreach ($speciality->specialAbilities as $special_ability)
                     <a href="#" data-toggle="popoverload" data-id="{{ $special_ability->id }}" data-type="specialabilities">{{ $special_ability->name }}</a> 	 
                @endforeach
            @endif            
            <p><a href="{{ route('admin.specialities.edit', $speciality->id) }}">Edit</a></p>
        </div>    
        <div role="tabpanel" class="tab-pane" id="panel-advances">        
            @if (count($speciality->skillAdvances()->first()) > 0)   
                <table  class="table table-striped">
                  <thead>    
                    <tr>
                        <th>Skill</th>	    
                        <th>Rank</th>
                        <th>Cost</th>
                        <th>Prerequisites</th>
                    </tr>
                  </thead>
                  <tbody>        
                @foreach ($speciality->skillAdvances as $skill)
                <tr>
                    <td><a href="#" data-toggle="popoverload" data-id="{{ $skill->id }}" data-type="skills" data-placement="auto">{{$skill->name}}</a> @if($skill->pivot->proficeincy) +{{$skill->pivot->proficeincy}} @endif</td>
                    <td>{{$skill->pivot->rank}}</td>
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

            @if (count($speciality->talentAdvances()->first()) > 0)   
                <table  class="table table-striped">
                  <thead>    
                    <tr>
                        <th>Talent</th>	    
                        <th>Rank</th>
                        <th>Cost</th>
                        <th>Prerequisites</th>
                    </tr>
                  </thead>
                  <tbody>        
                @foreach ($speciality->talentAdvances as $talent)
                <tr>
                    <td><a href="#" data-toggle="popoverload" data-id="{{ $talent->id }}" data-type="talents" data-placement="auto">{{$talent->name}}</a> @if($talent->pivot->talent_option_id) {{$talent->pivot->talent_option_id}} @endif</td>
                    <td>{{$talent->pivot->rank}}</td>
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

