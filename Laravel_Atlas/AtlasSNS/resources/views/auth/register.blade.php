@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach

<h2>新規ユーザー登録</h2>

{{ Form::label('user name') }}
<br>
{{ Form::text('username',null,['class' => 'input']) }}
<br>

{{ Form::label('mail address') }}
<br>
{{ Form::text('mail',null,['class' => 'input']) }}
<br>

{{ Form::label('password') }}
<br>
{{ Form::password('password',null,['class' => 'input']) }}
<br>

{{ Form::label('password comfirm') }}
<br>
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
<br>
{{ Form::submit('登録',['class' => 'button']) }}


<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
