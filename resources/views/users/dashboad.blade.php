@extends('layouts/default')

@section('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ダッシュボード｜ファンクリターン</title>
<meta name="description" content="{{ $data['discription'] }}"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="robots" content="noindex,follow" />
<link rel="shortcut icon" href="/favicon.ico">
@endsection

@section('content')
@include('elements/pc/base/header', ['bgcolor' => 'marin'])
@include('elements/pc/user/dashboad/contents')
@include('elements/pc/base/footer', ['bgcolor' => 'marin'])
@endsection
