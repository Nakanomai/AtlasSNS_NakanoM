@extends('layouts.login')

@section('content')


<p>Follower List</p>
@foreach ($list as $list)
<a href="users/{id}/profile">
  <img width="32" src="{{ asset('storage/' . $list->images) }}" >
</a>
@endforeach

@foreach ($timelines as $timelines)
<table>
  @if($timelines->user_id)
<tr>
  <td>
    <a href="users/{id}/profile">
      <img width="32" src="{{ asset('storage/' . $timelines->user->images) }}"></td>
    </a>
  <td>{{ $timelines->user->username }}</td>
  <td>{{ $timelines->post }}</td>
</tr>
@endif
</table>
@endforeach

@endsection
