<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/common.php");
if(!isset($_SESSION["state"]) || $_SESSION["state"] !== 0) {
  $_SESSION["state"] = "欢迎使用本后台管理系统";
  header("location: /cms/login.php?token=login");
  exit;
}
$ct_title = "";
$news_title = "";
$news_class = 1;
$news_date = date("Y-m-d");
$news_content = "";
$token = "";

if(isset($_GET["token"]) && !empty($_GET["token"])) {
  if($_GET["token"] === "post") {
    $ct_title = "发布文章";
    $token = "post_news";
  }
  if($_GET["token"] === "edit") {
    $ct_title = "修改文章";
    $token = "edit_news";
    if(isset($_GET["nid"]) && !empty($_GET["nid"])) {
      $nid = $_GET["nid"];
      $sql = "SELECT * FROM tab_news WHERE nid=$nid";
      $res = $dbo->exec_query($sql);
      if($res) {
        $news_title = $res[0]["title"];
        $news_class = $res[0]["class"];
        $news_date = $res[0]["issue"];
        $news_content = $res[0]["content"];
        $news_content = str_replace("'", "\'", $news_content);
        $news_content = str_replace("\"", "\\\"", $news_content);
      }
    }
  }
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
          <a href="/cms/mod_news.php?cls=1" class="list-group-item active">
            新闻资讯
          </a>
          <a href="/cms/cms_recruit.php" class="list-group-item">
            人才招聘
          </a>
        </div>
      </section>
      <section class="content col-lg-10 col-sm-9">
        <div class="content-title">
          <?php echo $ct_title; ?>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><b class="text-danger">*</b>标题：</span>
          <input type="text" class="form-control" id="news-title" name="news-title" placeholder="请输入文章标题" required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><b class="text-danger">*</b>类别：</span>
          <select name="news-class" id="news-class" class="form-control">
            <option value="1">通知公告</option>
            <option value="2">公司要闻</option>
            <option value="3">综合新闻</option>
          </select>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><b class="text-danger">*</b>日期：</span>
          <input type="date" class="form-control" id="news-date" name="news-date" required>
        </div>
        <div class="input-group">
          <label for="message-text" class="control-label input-group-addon"><b class="text-danger">*</b>内容：</label>
          <textarea class="form-control" id="news-content"></textarea>
        </div>
        <div style="text-align: center;">
          <button type="button" class="btn btn-default" id="btn_cancle">取消</button>
          <button type="button" class="btn btn-success" id="btn_post">确定</button>
        </div>
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
  
  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="/cms/lib/kindeditor/kindeditor-all-min.js"></script>
  <script src="/cms/lib/kindeditor/lang/zh-CN.js"></script>
  <script type="text/javascript" src="/cms/lib/index.js"></script>
  <script type="text/javascript" src="/cms/lib/mod_news.js"></script>
  <script>
		KindEditor.ready(function(K) {
      window.editor = K.create('#news-content', {
        width: '100%',
        height: '450px',
        resizeType: 0,
        allowFileManager : true,
        items: ['preview', '|', 'undo', 'redo', '|', 'template', 'plainpaste', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript', 'superscript', 'clearhtml', 'quickformat', '|', 'selectall', 'formatblock', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image','anchor', 'link', 'unlink', '|', 'source']
      });

      $("#news-title").val("<?php echo $news_title; ?>");
      $("#news-class").val("<?php echo $news_class; ?>");
      $("#news-date").val("<?php echo $news_date; ?>");
      window.editor.html("<?php echo $news_content; ?>");

      $("#btn_cancle").click(function() {
        window.location.href = "/cms/mod_news.php?cls="+$("#news-class").val();
      });

      $("#btn_post").click(function() {
        editor.sync();
        var fmd = new FormData();
        <?php
        if (isset($nid) && !empty($nid)) {
          echo 'fmd.append("nid", '.$nid.');';
        }
        ?>
        fmd.append("token", "<?php echo $token; ?>");
        fmd.append("title", $("#news-title").val());
        fmd.append("class", $("#news-class").val());
        fmd.append("issue", toDateString($("#news-date").val(), "-"));
        fmd.append("content", $("#news-content").val());
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
              window.location.href = "/cms/mod_news.php?cls="+$("#news-class").val();
            }
            else {
              alert(res);
            }
          }
        });
      });

    });
  </script>
</body>
</html>