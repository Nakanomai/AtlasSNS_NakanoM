@extends('layouts.login')

@section('content')

<form class="form-inline" action="{{url('/search')}}" method="GET">
                    <div class="form-group">
                    <input type="text" name="username" value=""
                    placeholder="ユーザー名">
                    <input type="submit" value="検索" >
                    </div>
                </form>


@foreach ($user as $user)

<tr>
  <img width="42" src="images/icon1.png">
  <td>{{ $user->username }}</td>


<!-- *変更* -->
@if (auth()->user()->isFollowing($user->id))<!--user.phpのisFollowingメソッドを呼び出す-->
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
<!-- /*変更* -->
</tr>

@endforeach
@endsection
