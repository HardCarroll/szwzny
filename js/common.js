// JavaScript Document
function newstagClick(param) {
  param.object.each(function() {
  if ($(this).index() === 0) {
    // 上一页处理过程
    $(this).click(function() {
      if(!$(this).hasClass("disabled")) {
        $(this).parent().children().last().removeClass("disabled");
        $(this).parent().find(".active").removeClass("active").prev().addClass("active");
        if($(this).parent().find(".active").index() === $(this).parent().children().first().index()+1) {
          $(this).addClass("disabled");
        }
        var obj = $.ajax({
          url: "/news/refresh_news_list.php?token="+param.token+"&cls="+param.class+"&page="+$(this).parent().find(".active").index(),
          context: param.list,
          success: function() {
            $(this).html(obj.responseText);
          }
        });
      }
    });
  }
  else if ($(this).index() === $(this).parent().children().length-1) {
    // 下一页处理过程
    $(this).click(function() {
      if(!$(this).hasClass("disabled")) {
        $(this).parent().children().first().removeClass("disabled");
        $(this).parent().find(".active").removeClass("active").next().addClass("active");
        if($(this).parent().find(".active").index() === $(this).parent().children().last().index()-1) {
          $(this).addClass("disabled");
        }
        var obj = $.ajax({
          url: "/news/refresh_news_list.php?token="+param.token+"&cls="+param.class+"&page="+$(this).parent().find(".active").index(),
          context: param.list,
          success: function() {
            $(this).html(obj.responseText);
          }
        });
      }
    });
  }
  else {
    $(this).click(function() {
      $(this).addClass("active").siblings().removeClass("active");
      var obj = $.ajax({
        url: "/news/refresh_news_list.php?token="+param.token+"&cls="+param.class+"&page="+$(this).index(),
        context: param.list,
        success: function() {
          $(this).html(obj.responseText);
        }
      });

      $(this).parent().children().first().removeClass("disabled");
      $(this).parent().children().last().removeClass("disabled");
      if($(this).index() === 1) {
        $(this).parent().children().first().addClass("disabled");
      }
      else if($(this).index() === $(this).parent().children().length-2) {
        $(this).parent().children().last().addClass("disabled");
      }
    });
  }
  });
}

function proCarousel() {
  var ele = $(".carousel-wrap").children("li").get(0);
  var eW = -(ele.offsetWidth+20) + "px";
  var $r = $(".carousel-wrap");
  // $r.stop().append(ele).css("left", 0).animate({left: eW});
  $r.stop().css({left: 0}).animate({left: eW}).append(ele);
  // ele.remove();
  // $r.append(ele);
}
function adCarousel() {
  var ele = $(".ad-list").children("li").get(0);
  var eW = -ele.offsetHeight + "px";
  var $r = $(".ad-list");
  $r.stop().css({top: 0}).animate({top: eW}).append(ele);
  // ele.remove();
  // $r.append(ele);
}
