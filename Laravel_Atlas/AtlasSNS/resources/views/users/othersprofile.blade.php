@extends('layouts.login')

@section('content')

<p></p>
<figure>
  <tr>
    <td><img width="35" src="{{ asset('storage/' . $user->images) }}" ></td>
    <th>name</th>
    <td>{{ $user->username }}</td>
    <br>
    <div>　　　<th>bio</th> {{ $user->bio }}</div>
  </tr>
</figure>

@if (auth()->user()->isFollowing($user->id))
<form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
<div class="submit_btn">
  <td><button type="submit" class="btn btn-primary js-modal-open btn-unfollow"
    style="background-color: red; border-color: #ed3833;">フォロー解除</button></td>
</div>
</form>
@else
<form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                                       {{ csrf_field() }}
<div class="submit_btn">
  <td><button type="submit" class="btn btn-primary js-modal-open">フォロー</button></td>
</div>
</form>
@endif

<hr>

@foreach ($posts as $posts)
<td>
  @if ($posts->user_id)
  <tr>
    <td><img width="32" src="{{ asset('storage/' . $posts->user->images) }}" ></td>
    <ul class="post_created_at_username">
      <li>{{ $posts->user->username }}</li>
      <li>{{ $posts->created_at }}</li>
    </ul>
    <div class="post_post">{{ $posts->post }}</div>
  </tr>
  @endif
</td>

@endforeach

@endsection
