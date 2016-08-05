@extends('layouts/default')

@section('title', 'Tech記事')

@section('content')
@include('elements/pc/base/header', ['bgcolor' => 'ruby'])
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => 'disable']])
@include('elements/pc/base/title', ['title' => 'Keijiの技術ブログ <small>tech</small><span class="glyphicon glyphicon-user right color-777"></span>'])
@include('elements/pc/article/index/contents', ['categories' => $categories, 'tags' => $tags])
@include('elements/pc/base/footer', ['bgcolor' => 'ruby'])
@endsection