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

	// スクロールバーカスタマイズ
	$(window).load(function(){
		$(".main").mCustomScrollbar();
	});

	// ホバー時の挙動(index.php)
	$('#linkul01').find('.goyoyakulink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#002100'},500); //色
		$('header').find('.bgheader').stop().fadeOut(); //右側
		$('header').find('.bg01').stop().fadeIn(); //右側
		$('header').find('.titleheader').stop().hide(); //右側
		$('header').find('.title01').stop().show(); //右側
		$('.bg11').stop().fadeIn(); //左側
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#a53926'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg06').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title06').stop().show();
		$('.bg11').stop().fadeOut();
	});
	$('#linkul01').find('.goannailink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#3a1212'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg02').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title02').stop().show();
		$('.bg12').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#a53926'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg06').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title06').stop().show();
		$('.bg12').stop().fadeOut();
	});
	$('#linkul01').find('.ofurolink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#855100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg03').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title03').stop().show();
		$('.bg13').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#a53926'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg06').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title06').stop().show();
		$('.bg13').stop().fadeOut();
	});
	$('#linkul01').find('.oshokujilink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#0b0e0f'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg04').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title04').stop().show();
		$('.bg14').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#a53926'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg06').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title06').stop().show();
		$('.bg14').stop().fadeOut();
	});
	$('#linkul01').find('.oheyalink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#04002b'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg05').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title05').stop().show();
		$('.bg15').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#a53926'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg06').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title06').stop().show();
		$('.bg15').stop().fadeOut();
	});

	// ホバー時の挙動(room.php)
	$('#linkul02').find('.goyoyakulink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#002100'},500); //色
		$('header').find('.bgheader').stop().fadeOut(); //右側
		$('header').find('.bg01').stop().fadeIn(); //右側
		$('header').find('.titleheader').stop().hide(); //右側
		$('header').find('.title01').stop().show(); //右側
		$('.bg11').stop().fadeIn(); //左側
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#04002b'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg05').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title05').stop().show();
		$('.bg11').stop().fadeOut();
	});
	$('#linkul02').find('.goannailink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#3a1212'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg02').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title02').stop().show();
		$('.bg12').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#04002b'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg05').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title05').stop().show();
		$('.bg12').stop().fadeOut();
	});
	$('#linkul02').find('.ofurolink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#855100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg03').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title03').stop().show();
		$('.bg13').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#04002b'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg05').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title05').stop().show();
		$('.bg13').stop().fadeOut();
	});
	$('#linkul02').find('.oshokujilink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#0b0e0f'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg04').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title04').stop().show();
		$('.bg14').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#04002b'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg05').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title05').stop().show();
		$('.bg14').stop().fadeOut();
	});
	$('#linkul02').find('.kabukiyalink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#a53926'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg06').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title06').stop().show();
		$('.bg16').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#04002b'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg05').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title05').stop().show();
		$('.bg16').stop().fadeOut();
	});

	// ホバー時の挙動(meal.php)
	$('#linkul03').find('.goyoyakulink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#002100'},500); //色
		$('header').find('.bgheader').stop().fadeOut(); //右側
		$('header').find('.bg01').stop().fadeIn(); //右側
		$('header').find('.titleheader').stop().hide(); //右側
		$('header').find('.title01').stop().show(); //右側
		$('.bg11').stop().fadeIn(); //左側
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#0b0e0f'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg04').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title04').stop().show();
		$('.bg11').stop().fadeOut();
	});
	$('#linkul03').find('.goannailink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#3a1212'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg02').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title02').stop().show();
		$('.bg12').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#0b0e0f'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg04').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title04').stop().show();
		$('.bg12').stop().fadeOut();
	});
	$('#linkul03').find('.ofurolink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#855100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg03').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title03').stop().show();
		$('.bg13').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#0b0e0f'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg04').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title04').stop().show();
		$('.bg13').stop().fadeOut();
	});
	$('#linkul03').find('.oheyalink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#04002b'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg05').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title05').stop().show();
		$('.bg15').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#0b0e0f'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg04').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title04').stop().show();
		$('.bg15').stop().fadeOut();
	});
	$('#linkul03').find('.kabukiyalink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#a53926'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg06').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title06').stop().show();
		$('.bg16').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#0b0e0f'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg04').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title04').stop().show();
		$('.bg16').stop().fadeOut();
	});

	// ホバー時の挙動(bath.php)
	$('#linkul04').find('.goyoyakulink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#002100'},500); //色
		$('header').find('.bgheader').stop().fadeOut(); //右側
		$('header').find('.bg01').stop().fadeIn(); //右側
		$('header').find('.titleheader').stop().hide(); //右側
		$('header').find('.title01').stop().show(); //右側
		$('.bg11').stop().fadeIn(); //左側
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#855100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg03').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title03').stop().show();
		$('.bg11').stop().fadeOut();
	});
	$('#linkul04').find('.goannailink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#3a1212'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg02').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title02').stop().show();
		$('.bg12').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#855100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg03').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title03').stop().show();
		$('.bg12').stop().fadeOut();
	});
	$('#linkul04').find('.oshokujilink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#0b0e0f'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg04').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title04').stop().show();
		$('.bg14').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#855100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg03').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title03').stop().show();
		$('.bg14').stop().fadeOut();
	});
	$('#linkul04').find('.oheyalink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#04002b'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg05').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title05').stop().show();
		$('.bg15').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#855100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg03').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title03').stop().show();
		$('.bg15').stop().fadeOut();
	});
	$('#linkul04').find('.kabukiyalink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#a53926'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg06').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title06').stop().show();
		$('.bg16').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#855100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg03').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title03').stop().show();
		$('.bg16').stop().fadeOut();
	});

	// ホバー時の挙動(guide.php)
	$('#linkul05').find('.goyoyakulink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#002100'},500); //色
		$('header').find('.bgheader').stop().fadeOut(); //右側
		$('header').find('.bg01').stop().fadeIn(); //右側
		$('header').find('.titleheader').stop().hide(); //右側
		$('header').find('.title01').stop().show(); //右側
		$('.bg11').stop().fadeIn(); //左側
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#3a1212'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg02').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title02').stop().show();
		$('.bg11').stop().fadeOut();
	});
	$('#linkul05').find('.ofurolink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#855100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg03').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title03').stop().show();
		$('.bg13').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#3a1212'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg02').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title02').stop().show();
		$('.bg13').stop().fadeOut();
	});
	$('#linkul05').find('.oshokujilink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#0b0e0f'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg04').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title04').stop().show();
		$('.bg14').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#3a1212'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg02').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title02').stop().show();
		$('.bg14').stop().fadeOut();
	});
	$('#linkul05').find('.oheyalink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#04002b'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg05').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title05').stop().show();
		$('.bg15').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#3a1212'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg02').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title02').stop().show();
		$('.bg15').stop().fadeOut();
	});
	$('#linkul05').find('.kabukiyalink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#a53926'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg06').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title06').stop().show();
		$('.bg16').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#3a1212'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg02').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title02').stop().show();
		$('.bg16').stop().fadeOut();
	});

	// ホバー時の挙動(reservation.php)
	$('#linkul06').find('.goannailink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#3a1212'},500); //色
		$('header').find('.bgheader').stop().fadeOut(); //右側
		$('header').find('.bg02').stop().fadeIn(); //右側
		$('header').find('.titleheader').stop().hide(); //右側
		$('header').find('.title02').stop().show(); //右側
		$('.bg12').stop().fadeIn(); //左側
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#002100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg01').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title01').stop().show();
		$('.bg12').stop().fadeOut();
	});
	$('#linkul06').find('.ofurolink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#855100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg03').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title03').stop().show();
		$('.bg13').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#002100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg01').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title01').stop().show();
		$('.bg13').stop().fadeOut();
	});
	$('#linkul06').find('.oshokujilink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#0b0e0f'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg04').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title04').stop().show();
		$('.bg14').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#002100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg01').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title01').stop().show();
		$('.bg14').stop().fadeOut();
	});
	$('#linkul06').find('.oheyalink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#04002b'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg05').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title05').stop().show();
		$('.bg15').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#002100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg01').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title01').stop().show();
		$('.bg15').stop().fadeOut();
	});
	$('#linkul06').find('.kabukiyalink').mouseenter(function() {
		$('#headernav').find('a').stop().animate({color: '#a53926'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg06').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title06').stop().show();
		$('.bg16').stop().fadeIn();
	}).mouseleave(function() {
		$('#headernav').find('a').stop().animate({color: '#002100'},500);
		$('header').find('.bgheader').stop().fadeOut();
		$('header').find('.bg01').stop().fadeIn();
		$('header').find('.titleheader').stop().hide();
		$('header').find('.title01').stop().show();
		$('.bg16').stop().fadeOut();
	});

});