@extends('layouts/default')

@section('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>記事編集｜ファンクリターン</title>
<meta name="description" content="{{ $data['discription'] }}"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="robots" content="noindex,follow" />
<link rel="shortcut icon" href="/favicon.ico">
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="/assets/bootstrap/dist/bootstrap-tagsinput.css" />
<link rel="stylesheet" type="text/css" href="/assets/bootstrap/rta/bootstrap-rta-1.0.0.min.css">
<link rel="stylesheet" type="text/css" href="/assets/highlight/styles/default.css">
@endsection

@section('content')
@include('elements/pc/base/header')
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', '編集画面' => 'disable']])
@include('elements/pc/article/edit/contents')
@include('elements/pc/base/footer')
@endsection

@section('script')
<script type="text/javascript" src="/assets/bootstrap/rta/bootstrap-rta.min.js"></script>
<script type="text/javascript" src="/js/edit.js"></script>
<script type="text/javascript" src="/assets/highlight/highlight.pack.js"></script>
<script>
	$(document).ready(function() {
	  $.rta($.rta.allButtons);
	});
	hljs.initHighlightingOnLoad();
</script>
@endsection