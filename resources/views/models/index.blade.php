@extends('layouts/default')

@section('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>モデルアプリケーション</title>
<meta name="description" content="各言語を使ったモデルアプリケーションを紹介しています。アプリケーションのベース基盤として新規アプリケーション作成時に参考になればと思います。"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="/favicon.ico">
@endsection

@section('content')
@include('elements/pc/base/header', ['bgcolor' => 'marin'])
@include('elements/pc/base/pankuzu', ['pankuzu' => ['Home' => '/', 'モデルアプリ' => 'disable']])
@include('elements/pc/model/index/contents')
@include('elements/pc/base/footer', ['bgcolor' => 'marin'])
@endsection