$(function(){
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