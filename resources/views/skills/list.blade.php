@extends('layouts.app')

@section('title', 'Skills')

@section('content')
    <h1>Skills</h1>
    @foreach ($skills as $skill)
	<div>            
            <h4>
                <a data-toggle="collapse" href="#skill-{{ $skill->id }}" aria-expanded="false" aria-controls="skill-{{ $skill->id }}">
                    @if (count($skill->group()->first()) > 0) {{ $skill->group()->first()->name }} @endif {{ $skill->name }} ({{ $attributes[$skill->attribute] }})
                </a>
            </h4>            
            <div class="collapse" id="skill-{{ $skill->id }}">
              <div class="well">
                    @if (count($skill->group()->first()) > 0)
                        <p>{!! nl2br(e($skill->group()->first()->description)) !!}</p>
                    @endif

                    <p>{!! nl2br(e($skill->description)) !!}</p>

                    @if ($skill->use) 
                        <p><b>Skill Use:</b> {!! nl2br(e($skill->use)) !!}</p>
                    @elseif (count($skill->group()->first()) > 0 && $skill->group()->first()->use)
                        <p><b>Skill Use:</b> {!! nl2br(e($skill->group()->first()->use)) !!}</p>
                    @endif

                    @if ($skill->special) 
                        <p><b>Special Uses:</b><br /> {!! nl2br(e($skill->special)) !!}</p>
                    @elseif (count($skill->group()->first()) > 0 && $skill->group()->first()->special)
                        <p><b>Special Uses:</b><br />  {!! nl2br(e($skill->group()->first()->special)) !!}</p>
                    @endif
              </div>
            </div>
        </div>          
    @endforeach
      </tbody>    
    </table>
</div>
@endsection 
