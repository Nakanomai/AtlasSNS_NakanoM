@extends('layouts.login')

@section('content')


<p>Follow List</p>
@foreach ($list as $list)
<tr>
  <td>
    <a class="icon" href="users/{{$list->id}}/profile" border="0">
      <img width="32" src="{{ asset('storage/' . $list->images) }}" border="0">
    </a>
  </td>
</tr>
@endforeach

<hr class="border-1">

@foreach ($timelines as $timelines)
<table>
  @if($timelines->user_id)
<div class="post_post">
  <td>
    <a href="users/{{$timelines->user->id}}/profile">
      <img width="32" src="{{ asset('storage/' . $timelines->user->images) }}">
    </a>
  </td>
  <ul class="post_created_at_username">
    <li>{{ $timelines->user->username }}</li>
    <li>{{ $list->created_at }}</li>
  </ul>
  <td class="post_post">{{ $timelines->post }}</td>
</div>
@endif
</table>
<hr>

@endforeach

@endsection
