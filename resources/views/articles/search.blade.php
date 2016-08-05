@extends('layouts/default')

@section('title', 'Tech記事｜検索結果')

@section('content')
@include('elements/pc/base/header', ['bgcolor' => 'ruby'])
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', $word => 'disable']])
@include('elements/pc/base/title', ['title' => $word. 'の検索結果'])
@include('elements/pc/article/search/contents')
@include('elements/pc/base/footer', ['bgcolor' => 'ruby'])
@endsection