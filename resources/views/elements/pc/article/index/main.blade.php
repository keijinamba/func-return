<h2 class="title-sm w-auto-fix">自然言語処理</h2>
<div class="jumbotron row center mb100 w-auto-fix w-auto-sm-0">
	<div class="panel panel-default col-xs-11 center float-none shadow5">
	  <div class="panel-heading">
	    <h3 class="panel-title fs20">形態素解析を試す</h3>
	  </div>
	  <div class="panel-body">
	      形態素解析とは、自然言語を処理する上で、ある言語で記述された文書を意味のある最小単位（形態素）に分割していき、品詞などを解析すること。
	      <br><br>
	      ここでは形態素解析エンジンMeCabを使って、どのように形態素解析がなされるかを試すことができます。
	      <p><a class="btn btn-red btn-lg shadow2 mt40" href="/analyze" role="button">形態素解析を試す</a></p>
	  </div>
	</div>
</div>

<h2 class="title-sm w-auto-fix">技術ブログ</h2>
<div class="mr0 ml0 row">
	<div class="col-sm-12 col-md-9 row center">
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
	@include('elements/pc/base/side')
</div>