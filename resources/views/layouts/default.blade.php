<!DOCTYPE html>
<html lang="en">
<head>
	@yield('meta')
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
	@yield('css')
	<link rel="stylesheet" type="text/css" href="/css/base/style.css">
</head>
<body>
	<div class="wrapper row">
		@yield('content')
	</div>
	<script type="text/javascript" src="/assets/jquery/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/assets/bootstrap/dist/bootstrap-tagsinput.min.js"></script>
	<script type="text/javascript" src="/js/base.js"></script>
	@yield('script')
</body>
</html>