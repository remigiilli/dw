<h3>{{ $chapter->name }}</h3>
  	
<p>{!! nl2br(e($chapter->creation)) !!}</p>
<h5>{{ $chapter->demeanour_title }}</h5>
<p>{!! nl2br(e($chapter->demeanour_description)) !!}</p>
<h5>{{ $chapter->curse_title }}</h5>
<p>{!! nl2br(e($chapter->curse_description)) !!}</p>
<p><a href="{{ route('admin.chapters.edit', $chapter->id) }}">Edit</a></p>