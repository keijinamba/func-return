<div class="main col-sm-12 col-md-9">
	<div class="row center">
	  <div class="mb50">
	  	<div class="panel panel-default">
			  <div class="panel-body">
			  	<div class="page-header">
					  <h1>{{ $tag->name }}</h1>
					</div>
					<ul class="nav nav-pills">
					@foreach($tag->articlestag as $articlestag)
					  <li role="presentation" class="w100p">
					  	<a href="/{{ $articlestag->articles->id }}" class="color-444">
					  		<h4 class="fs20 lh30">{{ $articlestag->articles->title }}</h4>
					  		<p class="fs14 color-777">{{ $articlestag->articles->discription }}</p>
					  	</a>
					  </li>
				  @endforeach
				  </ul>
				</div>
			</div>
		</div>
	</div>
</div>