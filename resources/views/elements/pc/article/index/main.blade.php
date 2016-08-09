<div class="main col-sm-12 col-md-9">
	<div class="row center">
		@foreach($data['categories'] as $category)
		@if(count($category->articles_five) > 0)
	  <div class="mb50">
	  	<div class="panel panel-default shadow1">
			  <div class="panel-body">
			  	<div class="page-header">
					  <h1>{{ $category->name }}</h1>
					</div>
					<ul class="nav nav-pills">
					@foreach($category->articles_five as $article)
					  <li role="presentation" class="w100p">
					  	<a href="/{{ $article->id }}" class="color-444">
					  		<h4 class="fs20 lh30">{{ $article->title }}</h4>
					  		<p class="fs14 color-777">{{ $article->discription }}</p>
					  	</a>
					  </li>
				  @endforeach
				  </ul>
				</div>
				<div class="panel-footer">
					<a href="/categories/{{ $category->id }}">
						<button type="button" class="btn btn-default btn-lg shadow3">
						  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
						  <span class="ml10 mr5">一覧へ</span>
						</button>
					</a>
				</div>
			</div>
		</div>
		@endif
	  @endforeach
	</div>
</div>