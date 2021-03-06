@extends('layouts/default')

@section('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>カテゴリー一覧｜FuncReturn</title>
<meta name="description" content="{{ $data['discription'] }}"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="/favicon.ico">
@endsection

@section('content')
@include('elements/pc/base/header')
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', 'Category' => 'disable']])
@include('elements/pc/base/title', ['title' => 'カテゴリー一覧'])
@include('elements/pc/category/index/contents')
@include('elements/pc/base/footer')
@endsection