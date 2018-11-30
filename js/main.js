// JavaScript Document
$(function(){
  var $pro_wrap = $(".pro-carousel");
  var $ad_wrap = $(".ad-list");
  var pro_timer = setInterval(proCarousel, 2000);
  var ad_timer = setInterval(adCarousel, 2000);
  $pro_wrap.mouseenter(function() {
    clearInterval(pro_timer);
  });
  $pro_wrap.mouseleave(function() {
    pro_timer = setInterval(proCarousel, 2000);
  });
  
  var obj_cpy = $.ajax({
    url: "/news/refresh_news_list.php?cls=2&page=1",
    context: $("#cpy-list")[0],
    success: function() {
      $(this).html(obj_cpy.responseText);
    }
  });
  var obj_all = $.ajax({
    url: "/news/refresh_news_list.php?cls=3&page=1",
    context: $("#all-list")[0],
    success: function() {
      $(this).html(obj_all.responseText);
    }
  });
  var obj_rec = $.ajax({
    url: "/recruit/position.php?token=rec_index",
    context: $("#rec-list")[0],
    success: function() {
      $(this).html(obj_rec.responseText);
    }
  });
}); // ready function
