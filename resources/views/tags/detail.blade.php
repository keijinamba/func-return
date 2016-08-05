@extends('layouts/default')

@section('title', 'Tech記事｜タグ詳細')

@section('content')
@include('elements/pc/base/header')
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', 'Tag' => '/tags', $tag->name => 'disable']])
@include('elements/pc/base/title', ['title' => $tag->name])
@include('elements/pc/tag/detail/contents')
@include('elements/pc/base/footer')
@endsection