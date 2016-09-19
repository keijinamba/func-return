<div class="main col-sm-12 col-md-9" data-id="{{ $article->id }}">
	<div class="w-auto">
		<div>
			@foreach($article->articlestag as $articlestag)
			<span class="tag-original"><a href="/tags/{{ $articlestag->tags->id }}">{{ $articlestag->tags->name }}</a></span>
			@endforeach
		</div>
		<div class="page-header">
		  <h1 class="color-cobalt">{{ $article->title }}</h1>
		</div>
		<div class="mt30 mb50">
			<h4 class="view_discription">{{ $article->discription }}</h4>
		</div>
		<div class="main-category">
			<!-- <img class="thumb-size mb100 center" src="{{ $article->category->thumb }}"> -->
			<div class="jumbotron" style="background-image: url('/img/thumb/thumbnail<?php echo rand(1, 10); ?>.jpg');">
				<div class="container">
			    <h1 class="text-border">{{ $article->category->name }}</h1>
					<p class="text-border">This is a <em>{{ $article->category->name }}</em> categorized page. To see more articles about <em>{{ $article->category->name }}</em>, click the button!</p>
				  <p><a class="btn btn-primary btn-lg" href="/categories/{{ $article->category->id }}" role="button">もっと見る</a></p>
			  </div>
			</div>
		</div>
		<div class="body">
			{!! $article->body !!}
		</div>
		<div class="article-underbox shadow1">
			<div class="posted-box">
				<span>posted on {{ date('Y年m月d日', strtotime($article->updated_at)) }}</span>
			</div>
			<div class="share-box">
				<!-- <span class="share-text">シェア</span> -->
	      <a class="twitter-share-button" target="_blank" href="https://twitter.com/share?url=<?php echo urlencode((empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>&text=<?php echo urlencode($article->title); ?>" data-dnt="true"></a>
	      <a class="facebook-share-button" target="_blank" href="https://www.facebook.com/sharer/sharer.php?url=<?php echo urlencode((empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>"></a>
	      <a class="googleplus-share-button" target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode((empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>" target="_blank" class="sn4 block"></a>
			</div>
		</div>
		@include('elements/pc/article/view/comment')
		<div class="col-sm-12 col-md-12 panel panel-default analyze-page">
		  <div class="panel-heading">
		    <h3 class="panel-title">このページを解析する</h3>
		  </div>
		  <div class="panel-body analyze-page-body">
		  	<div class="alert alert-info analyze-page-body-info" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only"></span>
				  ここでは形態素解析エンジンMeCabを使って、ページ内に出現する名刺を抽出して、その出現頻度順に表示することができます。
				</div>
		    <button type="button" class="btn btn-default btn-lg shadow3">
				  <span class="glyphicon glyphicon-retweet" aria-hidden="true"></span>
				  <span class="ml10 mr5">解析する</span>
				</button>
				<div class="analyze-page-body-main"></div>
		  </div>
		</div>
		<div class="articles_under_list">
			<div class="panel panel-default shadow1">
			  <div class="panel-heading">
			    <h3 class="panel-title">アクセスランキング</h3>
			  </div>
		    <ul class="panel-body list-group media-list">
		    	@foreach($top_articles as $top_article)
				  <li class="media list_box">
				    <div class="media-left">
				      <a href="/{{ $top_article->id }}">
				        <img class="media-object list_thumb_size" src="/img/thumb/thumbnail<?php echo rand(1, 10); ?>_sm.jpg" alt="サムネ">
				      </a>
				    </div>
				    <div class="media-body">
				      <a href="/{{ $top_article->id }}" class="media-heading fs12">{{ $top_article->title }}</a>
				    </div>
				  </li>
				  @endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
