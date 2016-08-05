@extends('layouts/default')

@section('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ファンクリターン</title>
<meta name="description" content="{{ $data['discription'] }}"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="robots" content="noindex,follow" />
<link rel="shortcut icon" href="/favicon.ico">
@endsection

@section('content')
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div>
        メールアドレス
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        パスワード
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> ログインを継続する
    </div>

    <div>
        <button type="submit">ログイン</button>
    </div>
</form>
@endsection