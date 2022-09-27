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
    <br>
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

<hr>

@foreach ($posts as $posts)
<td>
  @if ($posts->user_id)
  <tr>
    <td><img width="32" src="{{ asset('storage/' . $posts->user->images) }}" ></td>
    <td>{{ $posts->user->username }}</td>
    <br>
    <div class="post_post">{{ $posts->post }}</div>
  </tr>
  @endif
</td>

@endforeach

@endsection
