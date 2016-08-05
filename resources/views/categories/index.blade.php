@extends('layouts/default')

@section('title', 'Tech記事｜カテゴリー詳細')

@section('content')
@include('elements/pc/base/header')
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', 'Category' => 'disable']])
@include('elements/pc/base/title', ['title' => 'カテゴリー一覧'])
@include('elements/pc/category/index/contents', ['categories' => $categories])
@include('elements/pc/base/footer')
@endsection