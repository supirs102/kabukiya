$(function(){
	$("a[href^='#']").click(function(){
		
		//data-box属性がない場合は通常のスムーズスクロール
		if(!$(this).data("box")){
			$("body,html").stop().animate({
				scrollTop:$($(this).attr("href")).offset().top
			});
			
		//data-box属性がある場合はdata-box内をスムーズスクロール
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