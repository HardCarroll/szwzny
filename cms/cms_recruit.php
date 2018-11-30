<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/common.php");
if(!isset($_SESSION["state"]) || $_SESSION["state"] !== 0) {
  $_SESSION["state"] = "欢迎使用本后台管理系统";
  header("location: /cms/login.php?token=login");
  exit;
}
?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="Description" content="洈洲农业发展有限公司">
<meta name="Keywords" content="洈洲农业发展有限公司">
<title>在线办公平台，洈洲农业发展有限公司</title>
<link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/cms/lib/index.css">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
</head>

<body>
  <section class="page container-fluid">
    <div class="row head-nav">
      <section class="logo col-md-2 col-sm-3 col-xs-12">
        <a class="navbar-brand" href="/cms/index.php">
          <span class="glyphicon glyphicon-cloud"></span>
          <span>在线管理系统</span>
        </a>
      </section>
      <section class="account col-md-10 col-sm-9 col-xs-12">
        <ul class="nav navbar-nav navbar-right"> 
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user"></span>
              <span id="usr"><?php echo $_SESSION["user"]["usr"]; ?></span>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#" data-toggle="modal" data-target="#modPwd" role="button"><span class="glyphicon glyphicon-edit"></span>&nbsp;修改密码</a>
              </li>
              <li><a href="/cms/handle.php?location=login"><span class="glyphicon glyphicon-transfer"></span>&nbsp;切换账号</a>
              </li>
              <li class="divider" role="separator"></li>
              <li><a href="/cms/handle.php?location=index" id="btn-quit"><span class="glyphicon glyphicon-home"></span>&nbsp;返回首页</a></li>
            </ul>
          </li>
        </ul>
      </section>
    </div>
    <div class="row ct-wrap">
      <section class="aside-bar col-lg-2 col-sm-3 hidden-xs">
        <div class="list-group">
          <a href="/cms/mod_siteinfo.php" class="list-group-item">
            网站信息
          </a>
          <a href="/cms/mod_news.php?cls=1" class="list-group-item">
            新闻资讯
          </a>
          <a href="/cms/cms_recruit.php" class="list-group-item active">
            人才招聘
          </a>
        </div>
      </section>
      <section class="content col-lg-10 col-sm-9">
        <div class="content-title">招聘信息</div>
        <!--        职位信息-->
        <div class="recruit-tab">
          <table class="table table-hover">
            <thead>
              <tr>
                <td>#</td>
                <td>招聘职位</td>
                <td>工作地点</td>
                <td>发布日期</td>
                <td>功能列表</td>
              </tr>
            </thead>
            <tbody>
              <!-- 动态生成职位列表 -->
            </tbody>
          </table>
        </div>
        
        <div role="button" id="btn-rec-add" class="btn btn-success" style="width: 100%; margin-left: 0; border-radius: 4px;"><span class="glyphicon glyphicon-plus"></span></div>
        <section class="hidden" id="rec-editor">
          <div class="input-group">
            <span class="input-group-addon"><b class="text-danger">*</b>职位：</span>
            <input type="text" class="form-control" id="recruit-title" name="recruit-title" placeholder="请输入职位名称" required>
            <span class="input-group-addon"><b class="text-danger">*</b>人数：</span>
            <input type="text" class="form-control" id="recruit-count" name="recruit-count" placeholder="请输入招聘人数" required>
          </div>
          <div class="input-group">
            <span class="input-group-addon"><b class="text-danger">*</b>地点：</span>
            <input type="text" class="form-control" id="recruit-area" name="recruit-area" placeholder="请输入工作地点" required>
            <span class="input-group-addon"><b class="text-danger">*</b>待遇：</span>
            <input type="text" class="form-control" id="recruit-salary" name="recruit-salary" placeholder="请输入薪酬待遇" required>
          </div>
          <div class="input-group">
            <span class="input-group-addon"><b class="text-danger">*</b>发布日期：</span>
            <input type="date" class="form-control" id="recruit-date" name="recruit-date" required>
          </div>
          <div class="input-group">
            <label for="message-text" class="control-label input-group-addon"><b class="text-danger">*</b>详细内容：</label>
            <textarea class="form-control" id="recruit-content"></textarea>
          </div>
          <div style="text-align: center; margin: 15px 0;">
            <button type="button" class="btn btn-default" id="btn_cancle">取消</button>
            <button type="button" class="btn btn-success" id="btn_post">确定</button>
          </div>
        </section>
      </section>
    </div>
  </section>
  
  <!-- Modal modify password-->
  <div class="modal fade" id="modPwd" tabindex="-1" role="dialog" aria-labelledby="modPwdLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modPwdLabel">修改用户密码</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="old-pwd" class="control-label"><b class="text-danger">*</b>旧密码:</label>
              <input type="password" class="form-control" id="old-pwd" name="old-pwd" required>
            </div>
            <div class="form-group">
              <label for="new-pwd1" class="control-label"><b class="text-danger">*</b>新的密码:</label>
              <input type="password" class="form-control" id="new-pwd1" name="new-pwd1" required>
            </div>
            <div class="form-group">
              <label for="new-pwd2" class="control-label"><b class="text-danger">*</b>确认新密码:</label>
              <input type="password" class="form-control" id="new-pwd2" name="new-pwd2" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <span class="tips"></span>
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-primary" id="btn_ok">确认</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal delete confirm-->
  <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-danger" id="modalConfirmLabel">敬告</h4>
        </div>
        <div class="modal-body">
          此操作不可逆，请谨慎选择！您确认要删除吗？
        </div>
        <div class="modal-footer">
          <span class="tips"></span>
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-danger">确认</button>
        </div>
      </div>
    </div>
  </div>
  
  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="/cms/lib/kindeditor/kindeditor-all-min.js"></script>
  <script src="/cms/lib/kindeditor/lang/zh-CN.js"></script>
  <script type="text/javascript" src="/cms/lib/index.js"></script>
  <script>
		KindEditor.ready(function(K) {
      window.editor = K.create('#recruit-content', {
        width: '100%',
        height: '450px',
        resizeType: 0,
        allowFileManager : true,
        items: ['preview', '|', 'undo', 'redo', '|', 'template', 'plainpaste', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript', 'superscript', 'clearhtml', 'quickformat', '|', 'selectall', 'formatblock', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image','anchor', 'link', 'unlink', '|', 'source']
      });

      var obj_rec = $.ajax({
        url: "/recruit/position.php?token=rec_list_mod",
        context: $(".table>tbody")[0],
        success: function() {
          $(this).html(obj_rec.responseText);
          
          $(".table>tbody>tr>td:last-child>span.edit_rec").each(function() {
            $(this).click(function(){
              $("#btn-rec-add").removeClass("show").addClass("hidden");
              $("#rec-editor").removeClass("hidden").addClass("show");
              $("#btn_post").attr("data-token", "edit_rec");
              $("#btn_post").attr("data-pid", $(this).attr("data-pid"));
              
              $.ajax({
                url: "/cms/handle.php",
                type: "POST",
                data: "token=get_content&pid="+$(this).attr("data-pid"),
                processData: false,
                success: function(res) {
                  var ret = JSON.parse(res);
                  $("#recruit-title").val(ret.title);
                  $("#recruit-count").val(ret.counts);
                  $("#recruit-area").val(ret.area);
                  $("#recruit-salary").val(ret.salary);
                  $("#recruit-date").val(toDateString(ret.issue, "-"));
                  window.editor.html(ret.content);
                }
              });
            });
          });
          
          $(".table>tbody>tr>td:last-child>span.remove_rec").each(function() {
            $(this).click(function(){
              $("#modalConfirm").modal("show");
              $("#modalConfirm").attr("data-pid", $(this).attr("data-pid"));
            });
          });
        }
      });

      $("#btn-rec-add").click(function(){
        $(this).removeClass("show").addClass("hidden");
        $("#rec-editor").removeClass("hidden").addClass("show");
        $("#btn_post").attr("data-token", "post_rec");
      });

      $("#btn_cancle").click(function(){
        $("#btn-rec-add").removeClass("hidden").addClass("show");
        $("#rec-editor").removeClass("show").addClass("hidden");
        $("#btn_post").attr("data-token", "");
        $("#btn_post").attr("data-pid", "");
        $("#recruit-title").val("");
        $("#recruit-count").val("");
        $("#recruit-area").val("");
        $("#recruit-salary").val("");
        $("#recruit-date").val("");
        window.editor.html("");
      });

      $("#btn_post").click(function(){
        editor.sync();
        var fmd = new FormData();
        if ($("#btn_post").attr("data-token") === "edit_rec") {
          fmd.append("pid", $("#btn_post").attr("data-pid"));
        }
        fmd.append("token", $("#btn_post").attr("data-token"));
        fmd.append("title", $("#recruit-title").val());
        fmd.append("area", $("#recruit-area").val());
        fmd.append("salary", $("#recruit-salary").val());
        fmd.append("counts", $("#recruit-count").val());
        fmd.append("issue", toDateString($("#recruit-date").val(), "-"));
        fmd.append("content", $("#recruit-content").val());
        $.ajax({
          url: "/cms/handle.php",
          type: "POST",
          data: fmd,
          processData: false,
          contentType: false,
          success: function(res) {
            if ("success:post" === res || "success:edit" === res) {
              if ("success:post" === res) {
                alert("发布成功");
              }
              if ("success:edit" === res) {
                alert("修改成功");
              }
              window.location.href = "/cms/cms_recruit.php";
            }
            else {
              alert(res);
            }
          }
        });
      });
      
    });

    $("#modalConfirm .btn-danger").click(function() {
      $.ajax({
        url: "/cms/handle.php",
        type: "POST",
        data: "token=remove_rec&pid="+$("#modalConfirm").attr("data-pid"),
        processData: false,
        success: function() {
          location.reload(true);
        }
      });

    });
    
    function toDateString(str, sep) {
      var dd = new Date(str);
      var result = dd.getFullYear()+sep+("0"+(dd.getMonth()+1)).slice(-2)+sep+("0"+dd.getDate()).slice(-2);
      return result;
    }
  </script>
</body>
</html>