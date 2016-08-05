@extends('layouts/default')

@section('title', 'Tech記事｜詳細')

@section('css')
<link rel="stylesheet" type="text/css" href="/assets/highlight/styles/github-gist.css">
<style type="text/css">
	pre { padding: 0; margin: 0; color: initial; word-break: initial; word-wrap: initial; background-color: #f7f7f7; border: initial; border-radius: 3px; }
	pre .hljs { background-color: #f7f7f7; padding: .6em 1.2em; }
</style>
@endsection

@section('content')
@include('elements/pc/base/header')
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', $article->id => 'disable']])
@include('elements/pc/article/view/contents', ['article' => $article, 'tags' => $tags])
@include('elements/pc/base/footer')
@endsection

@section('script')
<script type="text/javascript" src="/assets/highlight/highlight.pack.js"></script>
<script>
	hljs.initHighlightingOnLoad();
</script>
@endsection