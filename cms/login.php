<?php
session_start();
if (isset($_GET["uid"]) && !empty($_GET["uid"])) {
  $uid = $_GET["uid"];
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>办公入口</title>
<link rel="stylesheet" href="/cms/lib/login.css">
</head>

<body>
  <section class="mask mask-show">
    <div class="content">
      <div class="header"><span><a href="/">首页</a></span></div>
      <form action="/cms/login_handle.php" method="post" enctype="application/x-www-form-urlencoded">
        <div class="item">
          <label>账号：</label>
          <input type="text" name="uid" id="in_account" required value="<?php echo isset($uid) ? $uid : ''; ?>" autofocus>
        </div>
        <div class="item">
          <label>密码：</label>
          <input type="password" name="pwd" id="in_password" required>
        </div>
        <div class="item"></div>
        <div class="tips">
          <?php
          if (isset($_SESSION["state"]) && !empty($_SESSION["state"])) {
            echo '<label class="err_wrong">'.$_SESSION["state"].'</label>';
          }
          else {
            echo '<label class="err_ok">欢迎使用本后台管理系统</label>';
          }
          ?>
          <input type="submit" id="btn_submit" value="提交">
        </div>
      </form>
    </div>
  </section>
</body>
</html>