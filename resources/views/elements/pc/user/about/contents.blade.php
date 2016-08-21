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
			  <div class="about_good inline mr50"><a href="" class="user-good color-444"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a><span class="about_count">{{ $user->good }}</span></div>
			  <div class="about_bad inline"><a href="" class="user-bad color-444"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></a><span class="about_count">{{ $user->bad }}</span></div>
		  </div>
		</div>
		<div class="panel panel-default user-about">
		  <div class="panel-heading">
		    <h3 class="panel-title">自己紹介</h3>
		  </div>
		  <div class="panel-body">
		      {!! nl2br($user->introduction) !!}
		  </div>
		</div>
		<div class="row">
			<div class=" col-xs-12 col-md-6 left">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Twitter</h3>
				  </div>
				  <div class="panel-body">
				  	<a class="twitter-timeline" data-height="500" data-theme="dark" href="https://twitter.com/keiji_1110">Tweets by keiji_1110</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
				  </div>
			  </div>
			</div>
			<div class=" col-xs-12 col-md-6 right">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Facebook</h3>
				  </div>
				  <div class="panel-body" style="overflow: auto;">
				  	<div class="fb-follow" data-href="https://www.facebook.com/keiji.namba" data-height="300" data-layout="standard" data-size="large" data-show-faces="true"></div>
				  </div>
			  </div>
			</div>
		  <div class=" col-xs-12 col-md-6 right">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Github</h3>
				  </div>
				  <div class="panel-body">
				  	<a class="github-button" href="https://github.com/keijinamba" data-style="mega" data-count-href="/keijinamba/followers" data-count-api="/users/keijinamba#followers">Follow @keijinamba</a>
				  </div>
			  </div>
		  </div>
		</div>
		<!-- <div class="panel panel-default user-about">
		  <div class="panel-heading">
		    <h3 class="panel-title">Follow Me</h3>
		  </div>
		  <div class="panel-body">
		  	<div class="col-xs-12 col-md-6 sns-box">
		  		<div class="well">
		        <a class="twitter-timeline" data-height="500" data-theme="dark" href="https://twitter.com/keiji_1110">Tweets by keiji_1110</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		      </div>
		    </div>
		    <div class="col-xs-12 col-md-6 sns-box">
		    	<div class="well">
			   	  <div class="fb-follow" data-href="https://www.facebook.com/keiji.namba" data-height="300" data-layout="standard" data-size="large" data-show-faces="true"></div>
			   	</div>
			   	<div class="well">
			      <a class="github-button" href="https://github.com/keijinamba" data-style="mega" data-count-href="/keijinamba/followers" data-count-api="/users/keijinamba#followers">Follow @keijinamba</a>
			    </div>
		    </div>
		  </div>
		</div> -->
  </div>
</div>