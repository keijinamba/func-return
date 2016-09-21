var W = $(window).width();
var H = $(window).height();

// footerの位置調整
var y = $('footer').offset().top;
var h = $('footer').height();
if (y + h < H) {
	$('footer').css({
		position: 'absolute',
		bottom: 0
	});
};

if (document.body.classList.contains('pc')) {

	$(document).on('click', '.header-menu-button', function() {
		unscrollable();
		$('.side-nav').addClass('side-nav-auto');
		$('.side-nav').addClass('side-nav-open');
		$('.modal-mask').addClass('modal-mask-open');
	});
	$(document).on('click', '.modal-mask', function() {
		scrollable();
		if ($('.side-nav').hasClass('side-nav-open')) $('.side-nav').removeClass('side-nav-open');
		if ($('.side-nav').hasClass('side-nav-auto')) $('.side-nav').removeClass('side-nav-auto');
		if ($('.top-search-modal').hasClass('top-search-modal-open')) $('.top-search-modal').removeClass('top-search-modal-open');
		setTimeout(function() {
			$('.modal-mask').removeClass('modal-mask-open');
		}, 400);
	});
	$(document).on('click', '.side-nav dl dd a', function() {
		$('.side-nav').removeClass('side-nav-open');
		setTimeout(function() {
			$('.modal-mask').removeClass('modal-mask-open');
		}, 400);
	});

}

$(document).on('click', '.header-search-button', function() {
	unscrollable();
	$('.top-search-modal-wrapper').addClass('top-search-modal-wrapper-open');
});
$(document).on('click', '.top-search-modal-space, .top-saerch-modal-remove', function() {
	scrollable();
	$('.top-search-modal-wrapper').removeClass('top-search-modal-wrapper-open');
});

// search box
$(document).on('keyup', '.top-search-modal-input', function() {
	var word = $(this).val();
	$.ajaxSetup({ headers: {
	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}});
	$.ajax({
		url: '/search',
		type: 'POST',
		dataType: 'json',
		data: {word: word},
		success: function(data) {
			insertSearchRes(data);
		},
		error: function() {}
	});
});

// view
$(document).on('click', '.analyze-page .analyze-page-body button', function() {
	var id = $('.main').data('id');
	$.ajaxSetup({ headers: {
	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}});
	$.ajax({
		url: '/articles/analyze',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success: function(data) {
			insertAnalyzeRes(data);
		},
		error: function() {}
	});
});

$(document).on('click', '.analyze-page-body-main-remove', function() {
	$('.analyze-page-body-main').html('');
});



function insertSearchRes(data) {
	if (data['articles'].length == 0) {
		$('.top-search-res-articles').html('');
	};
	if (data['articles'].length > 0) {
		$('.top-search-res-articles').html('<h2>記事</h2>');
		$.each(data['articles'], function(index, val) {
			$('.top-search-res-articles').append('<a href="/'+val['id']+'">'+val['title']+'</a>');
		});
	};
	if ( data['tags'].length == 0) {
		$('.top-search-res-tags').html('');
		return;
	};
	if (data['tags'].length > 0) {
		$('.top-search-res-tags').html('<h2>タグ</h2>');
		$.each(data['tags'], function(index, val) {
			$('.top-search-res-tags').append('<span class="tag-original"><a href="/tags/'+val['id']+'">'+val['name']+'</a></span>');
		});
	};
}

function insertAnalyzeRes(data) {
	$('.analyze-page-body-main').html('');
	$('.analyze-page-body-main').append('<span class="glyphicon glyphicon-remove analyze-page-body-main-remove" aria-hidden="true"></span>');
	$('.analyze-page-body-main').append('<h2 class="analyze-page-body-main-title">タイトル</h2>');
	$.each(data['title'], function(key, val) {
		$('.analyze-page-body-main').append('<div class="analyze-page-body-main-contents"><span>' + key + '</span><span> : </span><span>' + String(val) + '回</span></div>');
	});
	$('.analyze-page-body-main').append('<h2 class="analyze-page-body-main-title">説明文</h2>');
	$.each(data['discription'], function(key, val) {
		$('.analyze-page-body-main').append('<div class="analyze-page-body-main-contents"><span>' + key + '</span><span> : </span><span>' + String(val) + '回</span></div>');
	});
	$('.analyze-page-body-main').append('<h2 class="analyze-page-body-main-title">本文</h2>');
	$.each(data['body'], function(key, val) {
		$('.analyze-page-body-main').append('<div class="analyze-page-body-main-contents"><span>' + key + '</span><span> : </span><span>' + String(val) + '回</span></div>');
	});
	return;
}

function unscrollable(){
	var scroll_event = 'onwheel' in window ? 'wheel' : 'onmousewheel' in window ? 'mousewheel' : 'DOMMouseScroll';
	$(window).on(scroll_event,function(e){e.preventDefault();});
	$(window).on('touchmove.noScroll', function(e) {e.preventDefault();});
}
 
function scrollable(){
	var scroll_event = 'onwheel' in window ? 'wheel' : 'onmousewheel' in window ? 'mousewheel' : 'DOMMouseScroll';
	$(window).off(scroll_event);
	$(window).off('.noScroll');
}