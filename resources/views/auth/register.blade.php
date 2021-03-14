@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if($errors->has('username'))<p class="error">{{ $errors->first('username') }}</p> @endif

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if($errors->has('mail'))<p class="error">{{ $errors->first('mail') }}</p> @endif

{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}
@if($errors->has('password'))<p class="error">{{ $errors->first('password') }}</p> @endif

{{ Form::label('パスワード確認') }}
{{ Form::password('password-confirm',null,['class' => 'input']) }}
@if($errors->has('password-confirm'))<p class="error">{{ $errors->first('password-confirm') }}</p> @endif


{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
