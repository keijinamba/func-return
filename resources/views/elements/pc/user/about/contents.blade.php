<div class="jumbotron w-auto">
	<div class="container">
		<div class="row" data-id="{{ $user->id }}">
		  <div class="col-xs-4 col-md-3">
		    <a class="thumbnail">
		      <img class="w200 h200 about_thumb" src="{{ $user->thumb }}" alt="サムネイル画像">
		    </a>
		  </div>
		  <div class="col-xs-8 col-md-9">
		  	<h1 class="about_title">{{ $user->display_name }}</h1>
			  <p class="about_context">{{ $user->introduction }}</p>
			  <div class="about_good inline mr50"><a href="" class="user-good color-444"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a><span class="about_count">{{ $user->good }}</span></div>
			  <div class="about_bad inline"><a href="" class="user-bad color-444"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></a><span class="about_count">{{ $user->bad }}</span></div>
		  </div>
		</div>
  </div>
</div>