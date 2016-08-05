@extends('layouts/default')

@section('title', 'Tech記事｜ダッシュボード')

@section('content')
@include('elements/pc/base/header', ['bgcolor' => 'marin'])
@include('elements/pc/user/dashboad/contents')
@include('elements/pc/base/footer', ['bgcolor' => 'marin'])
@endsection
