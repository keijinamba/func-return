<div class="col-sm-12 col-md-3">
	<div class="panel panel-default shadow1">
	  <div class="panel-heading">
	    <h3 class="panel-title">カテゴリー一覧</h3>
	  </div>
    <ul class="panel-body list-group">
    	@foreach($data['categories'] as $category)
		  <a href="/categories/{{ $category->id }}" class="list-group-item">{{ $category->name }}</a>
		  @endforeach
		</ul>
	</div>
</div>
<div class="col-sm-12 col-md-3">
	<div class="panel panel-default shadow1">
	  <div class="panel-heading">
	    <h3 class="panel-title">タグ一覧</h3>
	  </div>
    <div class="panel-body">
    	@foreach($tags as $tag)
    	<span class="tag-original"><a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a></span>
    	@endforeach
		</div>
	</div>
</div>