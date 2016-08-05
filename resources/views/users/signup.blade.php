@extends('layouts/default')

@section('title', 'Signup')

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