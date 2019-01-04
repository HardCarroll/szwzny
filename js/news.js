// JavaScript Document
$((function () {
  var $lis_ads = $("#news-list-ads").children();
  var $lis_cpy = $("#news-list-cpy").children();
  var $lis_all = $("#news-list-all").children();
  
  var obj_ads = $.ajax({
    url: "/news/refresh_news_list.php?cls=1&page=1",
    context: $("#ads-list")[0],
    success: function() {
      $(this).html(obj_ads.responseText);
    }
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
  
  newstagClick({object: $lis_ads, class: 1, token: null, list: $("#ads-list")[0]});
  newstagClick({object: $lis_cpy, class: 2, token: null, list: $("#cpy-list")[0]});
  newstagClick({object: $lis_all, class: 3, token: null, list: $("#all-list")[0]});  
}));
