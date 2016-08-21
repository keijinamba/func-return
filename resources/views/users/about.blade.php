@extends('layouts/default')

@section('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>About｜ファンクリターン</title>
<meta name="description" content="{{ $data['discription'] }}"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="/favicon.ico">
@endsection

@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.7";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
@include('elements/pc/base/header', ['bgcolor' => 'malachite'])
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', 'About' => 'disable']])
@include('elements/pc/base/title', ['title' => '難波 啓司について'])
@include('elements/pc/user/about/contents')
@include('elements/pc/base/footer', ['bgcolor' => 'malachite'])
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$.ajaxSetup({
      headers: {
			  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 }
		});
	  $('.user-good').on('click', function() {
	  	var id = $(this).parent().parent().parent().data('id');
	  	$(this).siblings().text(Number($(this).siblings().text()) + 1);
	  	$.ajax({
	  		url: '/users/good',
	      method: 'post',
	      data: {id:id, point:1},
	      error:function(){},
	      success:function(res){}
	  	});
	  });
	  $('.user-bad').on('click', function() {
	  	var id = $(this).parent().parent().parent().data('id');
	  	$(this).siblings().text(Number($(this).siblings().text()) + 1);
	  	$.ajax({
	  		url: '/users/bad',
	      method: 'post',
	      data: {id:id, point:1},
	      error:function(){},
	      success:function(res){}
	  	});
	  });
	});
</script>
<script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
@endsection