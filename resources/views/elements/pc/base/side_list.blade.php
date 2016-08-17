<div class="col-sm-12 col-md-3">
	<div class="panel panel-default shadow1">
	  <div class="panel-heading">
	    <h3 class="panel-title">{{ $title }}</h3>
	  </div>
    <ul class="panel-body list-group media-list">
    	@foreach($list_articles as $article)
		  <li class="media list_box">
		    <div class="media-left">
		      <a href="/{{ $article->id }}">
		        <img class="media-object list_thumb_size" src="/img/thumb/thumbnail<?php echo rand(1, 10); ?>_sm.jpg" alt="サムネ">
		      </a>
		    </div>
		    <div class="media-body">
		      <a href="/{{ $article->id }}" class="media-heading fs12">{{ $article->title }}</a>
		    </div>
		  </li>
		  @endforeach
		</ul>
	</div>
</div>