// JavaScript Document
$(document).ready(function () {
  var $lis_ads = $("#news-list-ads").children();
  var $lis_cpy = $("#news-list-cpy").children();
  var $lis_all = $("#news-list-all").children();
  
  $("#modalConfirm .btn-danger").click(function() {
    $.ajax({
      url: "/cms/handle.php",
      type: "POST",
      data: "token=remove&nid="+$("#modalConfirm").attr("data-nid"),
      processData: false,
      success: function() {
        location.reload(true);
      }
    });
  });
  
  var obj_ads = $.ajax({
    url: "/news/refresh_news_list.php?token=cms_mod_news&cls=1&page=1",
    context: $("#ads-list")[0],
    success: function() {
      $(this).html(obj_ads.responseText);
    }
  });
  var obj_cpy = $.ajax({
    url: "/news/refresh_news_list.php?token=cms_mod_news&cls=2&page=1",
    context: $("#cpy-list")[0],
    success: function() {
      $(this).html(obj_cpy.responseText);
    }
  });
  var obj_all = $.ajax({
    url: "/news/refresh_news_list.php?token=cms_mod_news&cls=3&page=1",
    context: $("#all-list")[0],
    success: function() {
      $(this).html(obj_all.responseText);
    }
  });
  
  
  newstagClick({object: $lis_ads, class: 2, token: 'cms_mod_news', list: $("#ads-list")[0]});
  newstagClick({object: $lis_cpy, class: 2, token: 'cms_mod_news', list: $("#cpy-list")[0]});
  newstagClick({object: $lis_all, class: 2, token: 'cms_mod_news', list: $("#all-list")[0]});
    
});


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

function toDateString(str, sep) {
  var dd = new Date(str);
  var result = dd.getFullYear()+sep+("0"+(dd.getMonth()+1)).slice(-2)+sep+("0"+dd.getDate()).slice(-2);
  return result;
}

function remove_news(nid) {
  $("#modalConfirm").modal("show");
  $("#modalConfirm").attr("data-nid", nid);
}