@extends('layouts.login')

@section('content')


<p class="form-group">Follow List</p>
<div class="icon-group">
@foreach ($list as $list)
<tr>
    <a class="icon" href="users/{{$list->id}}/profile" border="0">
      <img width="32" src="{{ asset('storage/' . $list->images) }}" border="0">
    </a>
</tr>
@endforeach
</div>

<hr class="border-1">

@foreach ($timelines as $timelines)
  @if($timelines->user_id)
<div class="follow_content">
  <div class="">
    <td>
      <a href="users/{{$timelines->user->id}}/profile">
        <img width="32" src="{{ asset('storage/' . $timelines->user->images) }}">
      </a>
    </td>
    <ul class="post_created_at_username">
      <li>{{ $timelines->user->username }}</li>
      <li>{{ $list->created_at }}</li>
    </ul>
  </div>
  <div class="follow_post">{{ $timelines->post }}</div>
</div>
<hr>
@endif
@endforeach

@endsection
