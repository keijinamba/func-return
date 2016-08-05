@extends('layouts/default')

@section('title', 'Tech記事｜タグ一覧')

@section('content')
@include('elements/pc/base/header')
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', 'Tag' => 'disable']])
@include('elements/pc/base/title', ['title' => 'タグ一覧'])
@include('elements/pc/tag/index/contents')
@include('elements/pc/base/footer')
@endsection