    // smoothscroll
    // #にダブルクォーテーションが必要
    $('a[href^="#smooth1"]').click(function() {
       var headerHight = 100;
       var speed = 800;
       var href= $(this).attr("href");
       var target = $(href == "#" || href == "" ? 'html' : href);
       var position = target.offset().top-headerHight;
       $('body,html').animate({scrollTop:position}, speed, 'swing');
       return false;
    });