@extends('layouts/default')

@section('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>サインアップ｜FuncReturn</title>
<meta name="description" content="{{ $data['discription'] }}"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="robots" content="noindex,follow" />
<link rel="shortcut icon" href="/favicon.ico">
@endsection

@section('content')
<form method="post" action="/users/signup">
	{{ csrf_field() }}
	<p>
		<input type="text" name="username" placeholder="username">
	</p>
	<p>
		<input type="password" name="password" placeholder="password">
	</p>
	<p>
		<input type="submit" value="会員登録">
	</p>
</form>
@endsection