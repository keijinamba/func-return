@extends('layouts/default')

<?php
$keywords = '';
foreach ($article->articlestag as $articlestag) {
	if ($articlestag->tags) {
		$keywords .= $articlestag->tags->name.',';
	}
}
if ($keywords) {
	$keywords = substr($keywords, 0, -1);
}
?>

@section('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>{{ $article->title }}｜ファンクリターン</title>
<meta name="description" content="{{ $article->discription }}"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="<?php echo $keywords; ?>">
<link rel="shortcut icon" href="/favicon.ico">
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="/assets/highlight/styles/github-gist.css">
<style type="text/css">
	pre { padding: 0; margin: 0; color: initial; word-break: initial; word-wrap: initial; background-color: #f7f7f7; border: initial; border-radius: 3px; }
	pre .hljs { background-color: #f7f7f7; padding: .6em 1.2em; }
</style>
@endsection

@section('content')
@include('elements/pc/base/header')
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', 'Category' => '/categories', $article->category->name => '/categories/'.$article->category->id, $article->id => 'disable']])
@include('elements/pc/article/view/contents')
@include('elements/pc/base/footer')
@endsection

@section('script')
<script type="text/javascript" src="/assets/highlight/highlight.pack.js"></script>
<script>
	hljs.initHighlightingOnLoad();
</script>
@endsection