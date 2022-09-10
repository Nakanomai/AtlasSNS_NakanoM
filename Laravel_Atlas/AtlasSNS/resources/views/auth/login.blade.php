@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<br>
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
<br>
{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
