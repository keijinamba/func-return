@extends('layouts/default')

@section('title', 'Tech記事｜カテゴリー追加')

@section('content')
@include('elements/pc/base/header')
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', 'Category' => '/categories', 'Add' => 'disable']])
@include('elements/pc/category/add/contents')
@include('elements/pc/base/footer')
@endsection