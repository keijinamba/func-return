$('.edit-button-rta').click(function() {
	$('.rta-textarea').removeClass('unvisible');
	if (!$('.code-textarea').hasClass('unvisible')) $('.code-textarea').addClass('unvisible');
	if (!$('.test-textarea').hasClass('unvisible')) $('.test-textarea').addClass('unvisible');
});
$('.edit-button-code').click(function() {
	$('.code-textarea').removeClass('unvisible');
	if (!$('.rta-textarea').hasClass('unvisible')) $('.rta-textarea').addClass('unvisible');
	if (!$('.test-textarea').hasClass('unvisible')) $('.test-textarea').addClass('unvisible');
});
$('.edit-button-test').click(function() {
	$('.test-textarea').removeClass('unvisible');
	if (!$('.rta-textarea').hasClass('unvisible')) $('.rta-textarea').addClass('unvisible');
	if (!$('.code-textarea').hasClass('unvisible')) $('.code-textarea').addClass('unvisible');
});
$('.edit-button-add').click(function(){
	if( !$('.rta-textarea').hasClass('unvisible')) {
		$('.rta-textarea').addClass('unvisible');
		$('.preview').append($('.rta').val());
		$('.textarea-body').val($('.textarea-body').val() + $('.rta').val());
		$('.rta').val('');
	};
	if( !$('.code-textarea').hasClass('unvisible')) {
		$('.code-textarea').addClass('unvisible');
		var script = $('.code').val().replace( /</g , "&lt;").replace( />/g , "&gt;");
		$('.preview').append('<pre><code>' + script + '</pre></code>');
		$('.textarea-body').val($('.textarea-body').val() + '<pre><code>' + script + '</pre></code>');
		$('.code').val('');
	};
	if( !$('.test-textarea').hasClass('unvisible')) {
		$('.test-textarea').addClass('unvisible');
		var script = $('.test').val();
		$('.preview').append('<div class="html-test">' + script + '</div>');
		$('.textarea-body').val($('.textarea-body').val() + '<div class="html-test">' + script + '</div>');
		$('.test').val('');
	};
});
$('footer').css({
	position: 'relative'
});