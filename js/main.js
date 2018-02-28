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
		height : h + 24
	});
	$(window).resize(function(){
		var w = document.body.clientWidth;
		var h = document.body.clientHeight;
		$('#filter').css({
			width : w,
			height : h + 24
		});
	});

	// ホバー時の挙動
	// $('.goyoyakulink').hover(function() {
	// 	$('#headernav').find('a').stop().animate({color: '#f00'},500);
	// 	$('header').css({backgroundImage: 'url(images/nami.gif)'},500);
	// }, function() {
	// 	$('#headernav').find('a').stop().animate({color: 'black'},500);
	// 	$('header').css({backgroundImage: ''},500);
	// });

});