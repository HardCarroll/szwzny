$(function(){
  setInterval(adCarousel, 2000);
  var obj_rec = $.ajax({
    url: "/recruit/position.php?token=rec_list",
    context: $(".table>tbody")[0],
    success: function() {
      $(this).html(obj_rec.responseText);
    }
  });
});