@extends('layouts/default')

@section('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>検索結果｜FuncReturn</title>
<meta name="description" content="{{ $data['discription'] }}"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="/favicon.ico">
@endsection

@section('content')
@include('elements/pc/base/header', ['bgcolor' => 'ruby'])
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', $word => 'disable']])
@include('elements/pc/base/title', ['title' => $word. 'の検索結果'])
@include('elements/pc/article/search/contents')
@include('elements/pc/base/footer', ['bgcolor' => 'ruby'])
@endsection