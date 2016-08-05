<div class="col-sm-12 col-md-12">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">カテゴリー一覧</h3>
	  </div>
    <ul class="panel-body list-group">
    	@foreach($categories as $category)
		  <a href="/categories/{{ $category->id }}" class="list-group-item">{{ $category->name }}</a>
		  @endforeach
		</ul>
	</div>
</div>