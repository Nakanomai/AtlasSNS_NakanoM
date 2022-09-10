@extends('layouts.login')

@section('content')

<p></p>
@foreach ($users as $user)
<figure>
  <tr>
    <td>
      <img width="35" src="{{ asset('storage/' . $user->images) }}" >
    </td>
    <th>name</th>
    <td>{{ $user->username }}</td>
    <th>bio</th>
    <td>{{ $user->bio }}</td>
  </tr>
</figure>

@if (auth()->user()->isFollowing($user->id))
<form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
  <td><button type="submit" class="btn btn-primary js-modal-open">フォロー解除</button></td>
</form>
@else
  <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                                       {{ csrf_field() }}
  <td><button type="submit" class="btn btn-primary js-modal-open">フォロー</button></td>
  </form>
@endif

@endforeach

@foreach ($user as $user)
<table>
  @if ($user->user_id)
  <tr>
    <td><img width="32" src="{{ asset('storage/' . $user->images) }}" ></td>
    <td>{{ $user->username }}</td>
    <td>{{ $user->post }}</td>
  </tr>
  @endif
</table>

@endforeach

@endsection
