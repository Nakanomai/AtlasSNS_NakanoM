@extends('layouts.login')

@section('content')

<p></p>
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


@foreach ($posts as $posts)
<table>
  @if ($posts->user_id)
  <tr>
    <td><img width="32" src="{{ asset('storage/' . $posts->user->images) }}" ></td>
    <td>{{ $posts->username }}</td>
    <td>{{ $posts->post }}</td>
  </tr>
  @endif
</table>

@endforeach

@endsection
