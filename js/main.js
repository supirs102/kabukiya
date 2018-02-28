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
	$('.goyoyakulink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#f00'},500); //色
		$('header').find('.bgheader').stop().fadeOut(); //右側
		$('header').find('.bg02').stop().fadeIn(); //右側
		$('.bg11').stop().fadeIn(); //左側
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: 'black'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg01').stop().fadeIn();
		$('.bg11').stop().fadeOut();
		// $('header').find('#bgheader').attr('src', 'images/kin.jpg').fadeIn()
		// $('header').css({backgroundImage: ''},500);
	});
	$('.goannailink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#00f'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg03').stop().fadeIn();
		$('.bg12').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: 'black'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg01').stop().fadeIn();
		$('.bg12').stop().fadeOut();
	});

});