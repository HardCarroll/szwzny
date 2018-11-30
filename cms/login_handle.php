<?php
//请先在客户端判断uid和pwd的合法性，以减小服务器的压力，比如非空等
if (isset($_POST["uid"]) && !empty($_POST["uid"])) {
  session_start();
  $_SESSION["state"] = "欢迎使用本后台管理系统";
  $uid = $_POST["uid"];
  $pwd = $_POST["pwd"];
  
  if(isset($_SESSION["user"]) && ($_SESSION["user"]["uid"]===$uid || $_SESSION["user"]["usr"]===$uid)) {
    // 有session，则进行session验证
//    $user = $_SESSION["user"];
//    if (($user["uid"] === $uid || $user["usr"] === $uid) && $user["pwd"] === sha1($pwd)) {
    if ($_SESSION["user"]["pwd"] === sha1($pwd)) {
//    if (array_key_exists($uid, $user) && $user[$uid] === sha1($pwd)) {
      // session验证通过
      $_SESSION["state"] = 0;
      header("location: /cms/index.php");
      exit;
    }
    else {
      // session验证失败
      $_SESSION["state"] = "用户名或密码错误，请重新输入";
      header("location: /cms/login.php?uid=$uid");
      exit;
    }
  }
  else {
    require_once($_SERVER["DOCUMENT_ROOT"]."/cms/lib.php");
    $dbo = new DBOperator("localhost", "wzny_admin", "szwzny.com", "szwzny");
    if ($dbo->state["err_no"]) {
      // 数据库连接失败跳转至登录界面
      header("location: /cms/login.php?token=".$dbo->state["err_code"]);
      exit;
    }
    $sql = "SELECT * FROM tab_admin WHERE usr='$uid' or uid='$uid'";
    $result = $dbo->exec_query($sql);
    if(!$result || $dbo->state["err_no"]) {
      if (empty($dbo->state["err_code"])) {
        // 没有结果集
        $_SESSION["state"] = "用户名或密码错误，请重新输入";
        header("location: /cms/login.php?uid=$uid");
        exit;
      }
      header("location: /cms/login.php?token=".$dbo->state["err_code"]);
      exit;
    }
    $password = $result[0]["pwd"];
    if ($password === $pwd) {
//      验证成功
      $user = array("uid"=>$result[0]["uid"], "usr"=>$result[0]["usr"], "pwd"=>sha1($result[0]["pwd"]), "acs"=>$result[0]["acs"]);
      $_SESSION["state"] = 0;
      $_SESSION["user"] = $user;
      header("location: /cms/index.php");
      exit;
    }
    else {
      $_SESSION["state"] = "用户名或密码错误，请重新输入";
      header("location: /cms/login.php?uid=$uid");
      exit;
    }
  }
}
else {
  header("location: /cms/login.php?token=login");
  exit;
}
