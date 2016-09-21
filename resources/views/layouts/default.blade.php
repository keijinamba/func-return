<!DOCTYPE html>
<html lang="en">
<head>
	@yield('meta')
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
	@yield('css')
	<link rel="stylesheet" type="text/css" href="/css/base/style.css<?php echo (isset($uncacheParam) && $uncacheParam) ? "?up=". $uncacheParam : ""; ?>">
	@if($isProduct && !preg_match("|users/|",Request::path()) && !preg_match("|/add|",Request::path()) && !preg_match("|/edit|",Request::path()) && !preg_match("|admin-user/|",Request::path()))
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-84364499-1', 'auto');
	  ga('send', 'pageview');

	</script>
	@endif
</head>
<body class="<?php echo (isset($isMobile) && $isMobile) ? 'sp' : 'pc' ; ?>">
	<div class="wrapper row">
		@yield('content')
	</div>
	<script type="text/javascript" src="/assets/jquery/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="/assets/jquery/jquery.easing.js"></script>
	<script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/assets/bootstrap/dist/bootstrap-tagsinput.min.js"></script>
	<script type="text/javascript" src="/js/base.js<?php echo (isset($uncacheParam) && $uncacheParam) ? "?up=". $uncacheParam : ""; ?>"></script>
	<script type="text/javascript" src="/js/sidebar.js<?php echo (isset($uncacheParam) && $uncacheParam) ? "?up=". $uncacheParam : ""; ?>"></script>
	@yield('script')
</body>
</html>