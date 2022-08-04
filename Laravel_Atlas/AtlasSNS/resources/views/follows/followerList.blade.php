@extends('layouts.login')

@section('content')
<p>Follower List</p>
<?php $user = Auth::user(); ?>
<a href="users/{id}/profile"><img width="32" src="{{ asset('storage/' . $user->images) }}" ></a>
@foreach ($timelines as $timelines)

<table>
  @if($timelines->user_id)
<tr>
  <td><img width="32" src="{{ asset('storage/' . $user->images) }}"></td>
  <td>{{ $timelines->user_id }}</td>
  <td>{{ $timelines->post }}</td>
</tr>
@endif
</table>
@endforeach
@endsection
