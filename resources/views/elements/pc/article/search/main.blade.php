<div class="search-main col-sm-12 col-md-9">
	<div class="w-auto">
		@if(count($articles) != 0)
		<ul class="media-list">
			@foreach($articles as $article)
		  <li class="media mb50">
		    <div class="media-left">
		      <a href="#">
		        <img class="search-media-thumb media-object" src="{{ $article->category->thumb }}" alt="サムネ">
		      </a>
		    </div>
		    <div class="media-body">
		      <a href="/{{ $article->id }}" class="color-333 fs16 media-heading">{{ $article->title }}</a>
		    </div>
		  </li>
		  @endforeach
		</ul>
		<div class="pagination-wrapper">{{ $articles->appends(['word' => $word])->render() }}</div>
		@else
		<p class="search-not-found">{{ $word }}に合致する検索結果は見つかりませんでした</p>
		@endif
	</div>
</div>