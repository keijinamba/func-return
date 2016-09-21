@extends('layouts/default')

@section('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>自然言語処理｜ファンクリターン</title>
<meta name="description" content="自然言語処理をあれこれとやっていくページです。形態素解析エンジンMeCabを使って与えられた文章を単語レベルで分割して形態素解析がどのようなものか体験できます。"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="/favicon.ico">
@endsection

@section('content')
@include('elements/pc/base/header', ['bgcolor' => 'mediumorchid'])
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', '自然言語処理' => 'disable']])
@include('elements/pc/article/analyze/contents')
@include('elements/pc/base/footer', ['bgcolor' => 'mediumorchid'])
@endsection