<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/common.php");
if (isset($_GET["location"]) && !empty($_GET["location"])) {
  if ($_GET["location"] === "index") {
    header("location: /index.php");
    exit;
  }
  else if ($_GET["location"] === "login") {
    unset($_SESSION["state"]);
    unset($_SESSION["user"]);
    header("location: /cms/login.php");
    exit;
  }
}
else if (isset($_SESSION["state"]) && 0 === $_SESSION["state"] && isset($_POST["modpwd"]) && !empty($_POST["modpwd"])) {
  $usr = $_SESSION["user"]["usr"];
  $pwd = $_SESSION["user"]["pwd"];
  $password = json_decode($_POST["modpwd"], true);
  $ret = '';
  if ($password["new-pwd1"]===$password["new-pwd2"]) {
    $newpwd = $password["new-pwd1"];
    if ($pwd === sha1($password["old-pwd"])) {
      if ($dbo->state["err_no"]) {
        // 数据库连接失败
        $ret = '{"err_no":'.$dbo->state["err_no"].', "err_msg":'.$dbo->state["err_code"].'}';
        echo json_encode($ret);
        exit;
      }
      $sql = "UPDATE tab_admin SET pwd='$newpwd' WHERE usr='$usr'";
      $result = $dbo->exec_update($sql);
      if (!$result) {
        // 执行SQL语句失败
        $ret = '{"err_no": '.$dbo->state["err_no"].', "err_msg": '.$dbo->state["err_code"].'}';
      }
      else {
        unset($_SESSION["state"]);
        unset($_SESSION["user"]);
        $ret = '{"err_no": 0, "err_msg": "密码修改成功，请重新登录！"}';
      }
      echo json_encode($ret);
      exit;
    }
    else {
      $ret = '{"err_no": -1, "err_msg": "请输入正确的密码！"}';
      echo json_encode($ret);
      exit;
    }
  }
  else {
    $ret = '{"err_no": -2, "err_msg": "两次密码不同，请重新输入！"}';
    echo json_encode($ret);
    exit;
  }
}
else if (isset($_POST["siteinfo"]) && !empty($_POST["siteinfo"])) {
  if (isset($_SESSION["state"]) && 0 === $_SESSION["state"] && isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
    if (file_put_contents($_SERVER["DOCUMENT_ROOT"]."/json/base.json", $_POST["siteinfo"])) {
      unset($_SESSION["base"]);
      echo "修改成功！";
    }
  }
  else {
    echo "修改失败！";
  }
  exit;
}
else if (isset($_POST["token"]) && !empty($_POST["token"])) {
  if (isset($_SESSION["state"]) && 0 === $_SESSION["state"] && "remove" === $_POST["token"]) {
    $nid = $_POST["nid"];
    $sql = "DELETE FROM tab_news WHERE nid=$nid";
    $res = $dbo->exec_delete($sql);
    if (!$res) {
      echo "err_no: " . $dbo->state["err_no"] . "<br>err_code: " . $dbo->state["err_code"];
    }
    else {
      echo "success";
    }
  }

  if (isset($_SESSION["state"]) && 0 === $_SESSION["state"] && "remove_rec" === $_POST["token"]) {
    $pid = $_POST["pid"];
    $sql = "DELETE FROM tab_recruit WHERE pid=$pid";
    $res = $dbo->exec_delete($sql);
    if (!$res) {
      echo "err_no: " . $dbo->state["err_no"] . "<br>err_code: " . $dbo->state["err_code"];
    }
    else {
      echo "success";
    }
  }

  if (isset($_SESSION["state"]) && 0 === $_SESSION["state"] && ("post_news" === $_POST["token"] || "edit_news" === $_POST["token"])) {
    $title = $_POST["title"];
    $class = $_POST["class"];
    $issue = $_POST["issue"];
    $content = $_POST["content"];
    $content = str_replace("\"", "\\\"", $content);
    $content = str_replace("'", "\'", $content);
    $content = str_replace("\n", "", $content);
    $content = str_replace("\t", "", $content);

    if ("post_news" === $_POST["token"]) {
      $sql = "INSERT INTO tab_news(title, class, issue, content) VALUES ('$title', $class, '$issue', '".$content."')";
      $res = $dbo->exec_insert($sql);
      if (!$res) {
        echo "err_no: " . $dbo->state["err_no"] . "<br>err_code: " . $dbo->state["err_code"];
      }
      else {
        echo "success:post";
      }
    }
    if ("edit_news" === $_POST["token"]) {
      $nid = $_POST["nid"];
      $sql = "UPDATE tab_news SET title='$title', class=$class, issue='$issue', content='$content' WHERE nid=$nid";
      $res = $dbo->exec_update($sql);
      if (!$res) {
        echo "err_no: " . $dbo->state["err_no"] . "<br>err_code: " . $dbo->state["err_code"];
      }
      else {
        echo "success:edit";
      }
    }
  }

  if (isset($_SESSION["state"]) && 0 === $_SESSION["state"] && ("post_rec" === $_POST["token"] || "edit_rec" === $_POST["token"])) {
    $title = $_POST["title"];
    $issue = $_POST["issue"];
    $counts = $_POST["counts"];
    $salary = $_POST["salary"];
    $area = $_POST["area"];
    $content = $_POST["content"];
    $content = str_replace("\"", "\\\"", $content);
    $content = str_replace("'", "\'", $content);
    $content = str_replace("\n", "", $content);
    $content = str_replace("\t", "", $content);
    if ("post_rec" === $_POST["token"]) {
      $sql = "INSERT INTO tab_recruit(title, area, counts, salary, issue, content) VALUES ('$title', '$area', '$counts', '$salary', '$issue', '".$content."')";
      $res = $dbo->exec_insert($sql);
      if (!$res) {
        echo "err_no: " . $dbo->state["err_no"] . "<br>err_code: " . $dbo->state["err_code"];
      }
      else {
        echo "success:post";
      }
    }
    if ("edit_rec" === $_POST["token"]) {
      $pid = $_POST["pid"];
      $sql = "UPDATE tab_recruit SET title='$title', area='$area', counts='$counts', salary='$salary', issue='$issue', content='$content' WHERE pid=$pid";
      $res = $dbo->exec_update($sql);
      if (!$res) {
        echo "err_no: " . $dbo->state["err_no"] . "<br>err_code: " . $dbo->state["err_code"];
      }
      else {
        echo "success:edit";
      }
    }
  }

  if (isset($_SESSION["state"]) && 0 === $_SESSION["state"] && "get_content" === $_POST["token"] ) {
    $pid = $_POST["pid"];
    $sql = "SELECT * FROM tab_recruit WHERE pid=$pid";
    $ret = $dbo->exec_query($sql);
    echo json_encode($ret[0]);
  }

  exit;  
}
else {
  header("location: /cms/index.php");
  exit;
}