<div class="col-sm-12 col-md-9 comment_wrapper">
	<span class="glyphicon glyphicon-comment comment_icon right" aria-hidden="true"></span>
	<div class="comment_content">
		@if(count($article->comments) == 0)
		<h3> この記事にはまだコメントはありません </h3>
		@else
		@foreach($article->comments as $comment)
		<div>
			<span class="comment_content_name">{{ $comment->name }}</span>
			<span class="comment_content_date">{{ $comment->updated_at }}</span>
			<div class="comment_content_body">{{ $comment->body }}</div>
		</div>
		@endforeach
		@endif
	</div>
	<form class="comment_form" method="POST" action="/comments/add">
		{!! csrf_field() !!}
		<div>
			<label>名前</label>
			<input class="comment_input_name form-control" type="text" name="name" placeholder="No Name">
		</div>
		<div>
			<label>コメント</label>
			<textarea class="comment_input_body form-control" name="comment" placeholder="コメント" rows="6"></textarea>
		</div>
		<button type="submit" class="btn btn-default btn-primary comment_submit">
		  <span class="glyphicon glyphicon-open" aria-hidden="true"></span> 提出
		</button>
		<input type="hidden" name="article_id" value="{{ $article->id }}">
	</form>
</div>