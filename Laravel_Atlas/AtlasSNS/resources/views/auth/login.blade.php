@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('mail-address') }}
<br>
{{ Form::text('mail',null,['class' => 'input']) }}
<br>

{{ Form::label('password') }}
<br>
{{ Form::password('password',['class' => 'input']) }}
<br>

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
