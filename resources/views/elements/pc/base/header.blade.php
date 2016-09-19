<?php
$bgcolor = (isset($bgcolor) && $bgcolor) ? $bgcolor : "cobalt";
?>
<header class="header bcolor bcolor-{{ $bgcolor }} shadow2">
  <div class="header-menu">
    <button class="header-menu-button">
      <span class="glyphicon glyphicon-menu-hamburger header-menu-icon" aria-hidden="true"></span>
    </button>
    <a class="header-title" href="/">FuncReturn</a>
  </div>
  <button class="header-search-button">
    <span class="glyphicon glyphicon-search nav-search" aria-hidden="true"></span>
  </button>
</header>
<div class="side-nav mobile-sidebar">
  <div class="side-nav-wrapper">
    <h3 class="side-nav-title">FuncReturn</h3>
    <nav>
      <dl>
        <dt>カテゴリー</dt>
        <dd>
          @foreach($data['categories'] as $category)
          <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
          @endforeach
        </dd>
        <dt>その他のページ</dt>
        <dd>
          <a href="/about">制作者について</a>
          <a href="mailto:kijnmb.1110@gmail.com">お問い合わせ</a>
        </dd>
      </dl>
    </nav>
  </div>
</div>
<div class="top-search-modal-wrapper">
  <div class="top-search-modal shadow2 row">
    <form class="top-search-modal-form col-sm-9 col-md-9" method="GET" action="/search">
      <div class="top-search-box">
        <button type="submit">
          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
        <input class="top-search-modal-input" type="text" name="word" placeholder="記事を検索" autocomplete="off">
      </div>
    </form>
    <span class="glyphicon glyphicon-remove top-saerch-modal-remove" aria-hidden="true"></span>
    <div class="top-search-res top-search-res-articles col-sm-9 col-md-9">
    </div>
    <div class="top-search-res top-search-res-tags col-sm-9 col-md-9">
    </div>
  </div>
  <div class="top-search-modal-space"></div>
</div>
<div class="modal-mask"></div>