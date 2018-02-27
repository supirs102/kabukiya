$(function(){
	$('.goyoyakulink')
		.on('mouseover', function(){
			$('.main').animate({
				backgroundImage: url('../images/goannai_top.png')
			}, 500);
		})
		.on('mouseout', function(){
			$('.main').animate({
				backgroundImage: url('../images/ofuro_top.png')
			}, 500);
		});

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
});