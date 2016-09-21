$(document).on('click', '.analyze-main-input-box button', function() {
	var analyze_text = $('.analyze-main-input-text').val();
	if (!analyze_text) {
		alert('文章を入力してください！');
	}
	$.ajaxSetup({ headers: {
	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}});
	$.ajax({
		url: '/analyze/mecab',
		type: 'POST',
		dataType: 'json',
		data: {text: analyze_text},
		success: function(data) {
			$('.analyze-main-results h2').html("「" + analyze_text + "」<br><br>を形態素解析した結果");
			insertAnalyzeRes(data);
			$('.analyze-main-results').css('display', 'block');
		},
		error: function() {}
	});
});

function insertAnalyzeRes(obj) {
	$('.analyze-main-results .panel .panel-body').html('');
	$.each(obj, function(index, val) {
		$('.analyze-main-results .panel .panel-body').append('<div><p>' + val.word + '</p><p>' + val.feature + '</p></div>');
	});
}