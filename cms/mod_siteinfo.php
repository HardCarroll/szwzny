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
          <a href="/cms/mod_siteinfo.php" class="list-group-item active">
            网站信息
          </a>
          <a href="/cms/mod_news.php?cls=1" class="list-group-item">
            新闻资讯
          </a>
          <a href="/cms/cms_recruit.php" class="list-group-item">
            人才招聘
          </a>
        </div>
      </section>
      <section class="content col-lg-10 col-sm-9">
        <div class="input-group">
          <span class="input-group-addon">热线：</span>
          <input type="text" class="form-control" id="service-tel" name="service-tel" value="<?php echo $baseArr["service-tel"]; ?>">
        </div>
        <div class="input-group">
          <span class="input-group-addon">电话：</span>
          <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $baseArr["tel"]; ?>">
        </div>
        <div class="input-group">
          <span class="input-group-addon">传真：</span>
          <input type="text" class="form-control" id="fax" name="fax" value="<?php echo $baseArr["fax"]; ?>">
        </div>
        <div class="input-group">
          <span class="input-group-addon">邮箱：</span>
          <input type="text" class="form-control" id="e-mail" name="e-mail" value="<?php echo $baseArr["e-mail"]; ?>">
        </div>
        <div class="input-group">
          <span class="input-group-addon">网站：</span>
          <input type="text" class="form-control" id="site" name="site" value="<?php echo $baseArr["site"]; ?>">
        </div>
        <div class="input-group">
          <span class="input-group-addon">地址：</span>
          <input type="text" class="form-control" id="addr" name="addr" value="<?php echo $baseArr["addr"]; ?>">
        </div>
        <div class="row submit">
          <span class="tips col-xs-12 col-sm-8 col-md-10"></span>
          <div class="buttons col-xs-12 col-sm-4 col-md-2">
            <a href="/cms/index.php" id="btn_cancel" class="btn btn-default">取消</a>
            <a href="javascript:;" id="btn_submit" class="btn btn-info">确认</a>
          </div>
        </div>
      </section>
    </div>
  </section>
  
  <!-- Modal -->
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
              <label for="old-pwd" class="control-label">旧密码:</label>
              <input type="password" class="form-control" id="old-pwd" name="old-pwd" required>
            </div>
            <div class="form-group">
              <label for="new-pwd1" class="control-label">新的密码:</label>
              <input type="password" class="form-control" id="new-pwd1" name="new-pwd1" required>
            </div>
            <div class="form-group">
              <label for="new-pwd2" class="control-label">确认新密码:</label>
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
  <script src="/cms/lib/index.js"></script>
  <script src="/cms/lib/mod_siteinfo.js"></script>
</body>
</html>