@extends('layouts.login')

@section('content')


<p>Follow List</p>
@foreach ($list as $list)
<span>
  <a href="users/{{$list->id}}/profile">
    <img width="35" src="{{ asset('storage/' . $list->images) }}" >
  </a>
</span>
@endforeach


@foreach ($timelines as $timelines)
@if($timelines->user_id)
<tr>
  <td>
    <a href="users/{{$timelines->user->id}}/profile">
      <img width="32" src="{{ asset('storage/' . $timelines->user->images) }}">
    </a>
  </td>
</tr>

<table>
<tr>
  <td>
    <a href="users/{{$timelines->user->id}}/profile">
      <img width="32" src="{{ asset('storage/' . $timelines->user->images) }}">
    </a>
  </td>
  <td>{{ $timelines->user->username }}</td>
  <td>{{ $timelines->post }}</td>
</tr>
@endif
</table>
@endforeach
@endsection
