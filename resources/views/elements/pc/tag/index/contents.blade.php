<div class="col-sm-12 col-md-12">
	<div class="panel panel-default">
    <ul class="panel-body">
    	@foreach($tags as $tag)
    	<span class="tag-original">
		  	<a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>
		  </span>
		  @endforeach
		</ul>
	</div>
</div>