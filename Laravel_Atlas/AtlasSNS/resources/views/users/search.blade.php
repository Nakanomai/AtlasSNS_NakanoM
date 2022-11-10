@extends('layouts.login')

@section('content')

<form class="form-inline" action="{{url('/search')}}" method="GET">
                    <div class="form-group">
                    <input type="text" name="username" value=""
                    placeholder="ユーザー名">
                    <button type="submit" class="search_btn">
                      <img class="search_btn" width="30" src="images/search.png">
                    </button>
                    </div>
                </form>

<hr class="border-1">


@foreach ($user as $user)

<div class="search-container">
  <td><img width="32" src="{{ asset('storage/' . $user->images) }}"></td>
  <div class="search-wrapper">
  <td>{{ $user->username }}</td>


<!-- *変更* -->
@if (auth()->user()->isFollowing($user->id))<!--user.phpのisFollowingメソッドを呼び出す-->
<form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
  <td><button type="submit" class="follow_btn btn btn-primary js-modal-open btn-unfollow">フォロー解除</button></td>
</form>
@else
<form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                                       {{ csrf_field() }}
  <td><button type="submit" class="follow_btn btn btn-primary js-modal-open">フォロー</button></td>
</form>
@endif
</div>
<!-- /*変更* -->
</div>

@endforeach
@endsection
