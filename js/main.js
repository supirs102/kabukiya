$(function(){

	// おへやのページスムーススクロール
	$("a[href^='#']").click(function(){
		if(!$(this).data("box")){
			$("body,html").stop().animate({
				scrollTop:$($(this).attr("href")).offset().top
			});
		}else{
			var $box = $($(this).data("box"));
			var $tareget = $($(this).attr("href"));
			var dist = $tareget.position().top - $box.position().top;
			$box.stop().animate({
				scrollTop: $box.scrollTop() + dist
			}, 1000);
		}
		return false;
	});

	// 全体のフィルター
	var w = document.body.clientWidth;
	var h = document.body.clientHeight;
	$('#filter').css({
		width : w,
		height : h
	});
	$(window).resize(function(){
		var w = document.body.clientWidth;
		var h = document.body.clientHeight;
		$('#filter').css({
			width : w,
			height : h
		});
	});

	// ホバー時の挙動
	$('.goyoyakulink').hover(function() {
		$(this).stop().animate({backgroundColor: '#ffaa00'},200);
	}, function() {
		$(this).stop().animate({backgroundColor: '#ffaa00'},200);
	});

});