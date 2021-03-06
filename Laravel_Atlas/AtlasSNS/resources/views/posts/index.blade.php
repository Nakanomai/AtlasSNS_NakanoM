@extends('layouts.login')

@section('content')

<h2></h2>

{!! Form::open(['url' => 'post/create']) !!}
<div class="form-group">
  <img width="42" src="images/icon1.png">
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
    </div>
    <button type="submit" class="c_btn btn-success pull-right"><img width="50" src="images/post.png"></button>
{!! Form::close() !!}

@foreach ($list as $list)
<tr>
  <td>{{ $list->user_id }}</td>
  <td>{{ $list->post }}</td>
  <td>{{ $list->created_at }}</td>
  <td><button type="button" class="btn btn-primary js-modal-open" post="{{ $list->post }}" list_id="{{ $list->id }}">
  更新</button></td>
  <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
</tr>



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
        <button type="button" class="btn btn-primary">更新</button>
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
