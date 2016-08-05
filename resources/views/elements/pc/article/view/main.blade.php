<div class="main col-sm-12 col-md-9">
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
			<h4>{{ $article->discription }}</h4>
		</div>
		<div class="main-category">
			@if($article->category->thumb)
			<img class="thumb-size mb100 center" src="{{ $article->category->thumb }}">
			@else
			<div class="jumbotron">
				<div class="container">
			    <h1>{{ $article->category->name }}</h1>
					<p>This is a <em>{{ $article->category->name }}</em> categorized page. To see more articles about <em>{{ $article->category->name }}</em>, click the button!</p>
				  <p><a class="btn btn-primary btn-lg" href="/categories/{{ $article->category->id }}" role="button">もっと見る</a></p>
			  </div>
			</div>
			@endif
		</div>
		<div class="body">
			{!! $article->body !!}
		</div>
	</div>
</div>