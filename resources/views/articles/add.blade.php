@extends('layouts/default')

@section('title', 'Tech 記事')

@section('css')
<link rel="stylesheet" type="text/css" href="/assets/bootstrap/dist/bootstrap-tagsinput.css" />
<link rel="stylesheet" type="text/css" href="/assets/bootstrap/rta/bootstrap-rta-1.0.0.min.css">
<link rel="stylesheet" type="text/css" href="/assets/highlight/styles/default.css">
@endsection

@section('content')
@include('elements/pc/base/header')
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', '編集画面' => 'disable']])
@include('elements/pc/article/add/contents', ['categories' => $categories])
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