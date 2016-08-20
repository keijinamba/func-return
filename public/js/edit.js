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
$('.edit-button-image').click(function() {
	if (!$('.rta-textarea').hasClass('unvisible')) $('.rta-textarea').addClass('unvisible');
	if (!$('.code-textarea').hasClass('unvisible')) $('.code-textarea').addClass('unvisible');
	if (!$('.test-textarea').hasClass('unvisible')) $('.test-textarea').addClass('unvisible');

	$("#myModal .modal-body").html('');
	$.ajaxSetup({ headers: {
	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}});
	$.ajax({
		type : "POST",
		dataType : "json",
		data : {},
		url : "/articles/findImages",
		error: function() {},
		success: function(res) {
			console.log(res.files);
			$.each(res.files, function(index, value) {
				if (value.substr(0, 1) != ".") {
					$("#myModal .modal-body").append("<div class='col-xs-3 col-md-3'><a href='#' data-dismiss='modal' class='modal-image' data-name='" + value + "'><img style='width: 100%;' src='/img/upload/" + value + "' alt='画像'></a></div>");
				}
			});
		}
	});
});
$(document).on("click", ".modal-image", function() {
	var url = $(this).data('name');
	$('.preview').append("<div><img class='content-image shadow2' src='/img/upload/" + url + "' alt='画像'></div>");
	$('.textarea-body').val($('.textarea-body').val() + "<div><img class='content-image shadow2' src='/img/upload/" + url + "' alt='画像'></div>");
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
$("#image_form_submit").click(function(){
  var fd = new FormData();
  if ($("#image_form_file").val()!== '') {
    fd.append( "file", $("#image_form_file").prop("files")[0] );
  }
  var postData = {
    type : "POST",
    dataType : "json",
    data : fd,
    processData : false,
    contentType : false
  };
  $.ajaxSetup({ headers: {
	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}});
  $.ajax(
    "/articles/upload_image", postData
  ).done(function(res){
    console.log(res);
  });
});
$('footer').css({
	position: 'relative'
});