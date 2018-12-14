// JavaScript Document
$(document).ready((function () {
  $("#btn_ok").click(function(){
    if ($("#new-pwd1").val() !== $("#new-pwd2").val()) {
      $(".modal-footer>.tips").html("两次输入的密码不同，请重新输入！");
      $("#new-pwd1").focus();
    }
    else {
      var fd_modpwd = new FormData();
      var value = '{"usr": "'+$("#usr").val()+'", "old-pwd": "'+$("#old-pwd").val()+'", "new-pwd1": "'+$("#new-pwd1").val()+'", "new-pwd2": "'+$("#new-pwd2").val()+'"}';
      fd_modpwd.append("modpwd", value);
      $.ajax({
        url: "/cms/handle.php",
        type: "POST",
        data: fd_modpwd,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (result) {
          var ret = JSON.parse(result);
          $(".modal-footer>.tips").html(ret.err_msg);
          if (ret.err_no) {
            $("#old-pwd").focus();
          }
          else {
            setTimeout(function() {
              $("#modPwd").modal("hide");
              location.reload(true);
            }, 1600);
          }
//          console.log("success: "+result);
        },
        error: function(msg) {
          console.log("fail: "+msg);
        }
      });
    }
  });

  $("#modPwd").on('hidden.bs.modal', function () {
    $("#old-pwd").val('');
    $("#new-pwd1").val('');
    $("#new-pwd2").val('');
    $(".modal-footer>.tips").html('');
  });
  
}));