<div class="jumbotron w-auto">
	<div class="container">
		<div class="row" data-id="{{ $user->id }}">
		  <div class="col-xs-6 col-md-3">
		    <a class="thumbnail">
		      <img class="w200 h200" src="{{ $user->thumb }}" alt="サムネイル画像">
		    </a>
		  </div>
		  <div class="col-xs-6 col-md-9">
		  	<h1>{{ $user->display_name }}</h1>
			  <p>{{ $user->introduction }}</p>
			  <div class="inline mr50"><a href="" class="user-good color-444"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 45px;"></span></a><span style="font-size: 30px;">{{ $user->good }}</span></div>
			  <div class="inline"><a href="" class="user-bad color-444"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true" style="font-size: 45px;"></span></a><span style="font-size: 30px;">{{ $user->bad }}</span></div>
		  </div>
		</div>
  </div>
</div>