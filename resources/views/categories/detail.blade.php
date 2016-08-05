@extends('layouts/default')

@section('title', 'Tech記事｜カテゴリー詳細')

@section('content')
@include('elements/pc/base/header')
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', 'Category' => '/categories', $category->name => 'disable']])
@include('elements/pc/base/title', ['title' => $category->name])
@include('elements/pc/category/detail/contents', ['category' => $category, 'tags' => $tags])
@include('elements/pc/base/footer')
@endsection