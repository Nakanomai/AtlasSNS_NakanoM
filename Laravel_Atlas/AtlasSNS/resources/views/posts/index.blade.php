@extends('layouts.login')

@section('content')

<h2></h2>

{!! Form::open(['url' => 'post/create']) !!}
<div class="form-group">
  <?php $user = Auth::user(); ?>
  <img width="42" src="{{ asset('storage/' . $user->images) }}">
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-post', 'placeholder' => '投稿内容を入力してください。']) !!}
</div>
    <button type="submit" class="submit_btn">
      <img class="submit_btn" width="70" src="images/post.png">
    </button>
    <hr class="border-1">
{!! Form::close() !!}

@foreach ($list as $list)

 <div class="post_content">
   <div>
     <td><img width="32" src="{{ asset('storage/' . $list->user->images) }}" ></td>
     <ul class="post_created_at_username">
       <li>{{ $list->user->username }}</li>
       <li>{{ $list->created_at }}</li>
     </ul>
   </div>
    <div class="post_post">{{ $list->post }}</div>

      <div class="btn-post">
        <td>
        <button class="post js-modal-open" post="{{ $list->post }}" list_id="{{ $list->id }}">
          <img class="post" width="29" src="images/edit.png">
        </button>
        </td>
        <td>
        <a class="destroy" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
          <img class="destroy" width="40" src="images/trash-h.png"></a>
        </td>
      </div>
</div>
  <hr>




<!-- <div class="post_content"> アイコン・名前・時間で囲む
  <figure><img width="32" src="{{ asset('storage/' . $list->user->images) }}"></figure>
    <div class="post_created_at_username">
      <p class="post_created_at_username">{{ $list->user->username }}</p> 名前
      <p class="post_created_at_username">{{ $list->created_at }}</p> 時間　右端に置く
    </div>
</div>
<div class="post_btn_post"> 投稿内容とボタン
  <div class="post_post">{{ $list->post }}</div> 投稿内容
  <div class="btn_post">  ボタン
    <div class="btn_post">  編集
      <button class="post js-modal-open" post="{{ $list->post }}" list_id="{{ $list->id }}">
        <img class="post" width="29" src="images/edit.png">
      </button>
    </div>
    <div class="btn_post"> 削除
      <a class="destroy" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
        <img class="destroy" width="40" src="images/trash-h.png">
      </a>
    </div>
  </div>
</div>
  <hr> 線 -->


<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $list->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="content">
	</div>
	<div class="modal js-modal">
		<div class="modal__bg js-modal-close"></div>
		<div class="modal__content">
      <form class="" action="/post/update" method="post">
        <input type="text" name="upPost" value="" class="upPost" required placeholder="投稿内容を入力してください。">
        <input type="hidden" name="id" value="" class="post_id">
        <button type="submit" class="btn btn-primary">更新</button>
        {{ csrf_field() }}
      </form>
			<a class="js-modal-close" href="">閉じる</a>
		</div><!--modal__inner-->
	</div><!--modal-->


@endforeach

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/script.js')}}" rel="stylesheet">


  </script>
@endsection
