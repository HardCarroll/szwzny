$(document).ready((function() {        
  $("#btn_submit").click(function(){
    var fd_modbase = new FormData();
    var val = '{"service-tel":"'+$("#service-tel").val()+'", "tel":"'+$("#tel").val()+'", "fax":"'+$("#fax").val()+'", "e-mail":"'+$("#e-mail").val()+'", "site":"'+$("#site").val()+'", "addr":"'+$("#addr").val()+'"}';
    fd_modbase.append("siteinfo",val);
    $.ajax({
      url: "/cms/handle.php",
      type: "POST",
      data: fd_modbase,
      processData: false,
      contentType: false,
      success: function (result) {
        console.log("success: "+result);
        $(".submit>.tips").html(result);
      },
      error: function(msg) {
        console.log("fail: "+msg);
      }
    });
  });
}));
