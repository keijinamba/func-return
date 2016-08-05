<ol class="breadcrumb w-auto-fix shadow1">
	@foreach ($pankuzu as $page => $val)
	@if ($val == 'disable')
	<li class="active">{{ $page }}</li>
	@else
	<li><a href="{{ $val }}">{{ $page }}</a></li>
	@endif
	@endforeach
</ol>