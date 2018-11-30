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
          <a href="/cms/mod_news.php?cls=1" class="list-group-item active">
            新闻资讯
          </a>
          <a href="/cms/cms_recruit.php" class="list-group-item">
            人才招聘
          </a>
        </div>
      </section>
      <section class="content col-lg-10 col-sm-9">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs ct-tab-list" role="tablist">
          <li class="<?php if(!isset($_GET['cls']) || empty($_GET['cls']) || $_GET['cls']==1){echo 'active';}?>"><a href="/cms/mod_news.php?cls=1">通知公告</a></li>
          <li class="<?php if(isset($_GET['cls']) && !empty($_GET['cls']) && $_GET['cls']==2){echo 'active';}?>"><a href="/cms/mod_news.php?cls=2">公司要闻</a></li>
          <li class="<?php if(isset($_GET['cls']) && !empty($_GET['cls']) && $_GET['cls']==3){echo 'active';}?>"><a href="/cms/mod_news.php?cls=3">综合新闻</a></li>
          <li class="pull-right"><a href="/cms/cms_content.php?token=post" class="btn btn-success"><span class="glyphicon glyphicon-send"></span>发布文章</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane news-tab <?php if(isset($_GET['cls']) && !empty($_GET['cls']) && $_GET['cls']==1){echo 'active';}?>">
            <ul class="news-list list-group" id="ads-list">
<!--              动态生成新闻列表-->
            </ul>
            
            <div class="list-wrap">
              <?php
  //            分页按钮动态输出
              $cnt_ads = $newsArr["class"]["1"];
              if ($cnt_ads/10>1) {
                echo '<ul class="pagination" id="news-list-ads"><li class="disabled"><span aria-label="Previous"><span aria-hidden="true">&laquo;</span></span></li>';
                echo '<li class="active"><span>1</span></li>';
                
                for($i=1; $i<$cnt_ads/10; $i++) {
                  echo '<li><span>';
                  echo $i+1;
                  echo '</span></li>';
                }
                echo '<li><span aria-label="Next"><span aria-hidden="true">&raquo;</span></span></li></ul>';
              }
              ?>
            </div>
          </div>
          
          <div class="tab-pane news-tab <?php if(isset($_GET['cls']) && !empty($_GET['cls']) && $_GET['cls']==2){echo 'active';}?>">
            <ul class="news-list" id="cpy-list">
<!--              动态生成新闻列表-->
            </ul>
            <div class="list-wrap">
              <?php
  //            分页按钮动态输出
              $cnt_cpy = $newsArr["class"]["2"];
              if ($cnt_cpy/10>1) {
                echo '<ul class="pagination" id="news-list-cpy"><li class="disabled"><span aria-label="Previous"><span aria-hidden="true">&laquo;</span></span></li>';
                echo '<li class="active"><span>1</span></li>';
                
                for($i=1; $i<$cnt_cpy/10; $i++) {
                  echo '<li><span>';
                  echo $i+1;
                  echo '</span></li>';
                }
                echo '<li><span aria-label="Next"><span aria-hidden="true">&raquo;</span></span></li></ul>';
              }
              ?>
            </div>
          </div>
          <div class="tab-pane news-tab <?php if(isset($_GET['cls']) && !empty($_GET['cls']) && $_GET['cls']==3){echo 'active';}?>">
            
            <ul class="news-list" id="all-list">
<!--              动态生成新闻列表-->
            </ul>
            <div class="list-wrap">
              <?php
  //            分页按钮动态输出
              $cnt_all = $newsArr["class"]["3"];
              if ($cnt_all/10>1) {
                echo '<ul class="pagination" id="news-list-all"><li class="disabled"><span aria-label="Previous"><span aria-hidden="true">&laquo;</span></span></li>';
                echo '<li class="active"><span>1</span></li>';
                
                for($i=1; $i<$cnt_all/10; $i++) {
                  echo '<li><span>';
                  echo $i+1;
                  echo '</span></li>';
                }
                echo '<li><span aria-label="Next"><span aria-hidden="true">&raquo;</span></span></li></ul>';
              }
              ?>
            </div>
          </div>
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
  
  <!-- Modal delete news-->
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
  <script type="text/javascript" src="/cms/lib/mod_news.js"></script>
  <script>
		KindEditor.ready(function(K) {
      window.editor = K.create('#news-content', {
        width: '495px',
        height: '450px',
        minWidth: 495,
        resizeType: 0,
        allowFileManager : true,
        items: ['preview', '|', 'undo', 'redo', '|', 'template', 'plainpaste', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript', 'superscript', 'clearhtml', 'quickformat', 'selectall', '/', 'formatblock', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image','anchor', 'link', 'unlink', '|', 'source']
      });
    })
	</script>
</body>
</html>