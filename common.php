<?php
session_start();
date_default_timezone_set("Asia/Shanghai");
require_once($_SERVER["DOCUMENT_ROOT"]."/cms/lib.php");
$dbo = new DBOperator("localhost", "wzny_admin", "szwzny.com", "szwzny");

$sql = "SELECT * FROM tab_news ORDER BY nid ASC";
$result = $dbo->exec_query($sql);
$newsArr = array("total"=>count($result));
$cnt_ads = $cnt_cpy = $cnt_all = 0;
foreach ($result as $arr) {
  if ($arr["class"] == 1) {
    $cnt_ads += 1;
  }
  if ($arr["class"] == 2) {
    $cnt_cpy += 1;
  }
  if ($arr["class"] == 3) {
    $cnt_all += 1;
  }
}
$newsArr["class"] = array("1"=>$cnt_ads, "2"=>$cnt_cpy, "3"=>$cnt_all);

$adsArr = array();
for ($i=0; $i<5; $i++) {
  $adsArr[] = $result[$i]["title"];
}

$sql = "SELECT * FROM tab_recruit";
$result = $dbo->exec_query($sql);
$counts_rec = count($result);

$arr_week=array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
$date_str = "Y年m月d日 ".$arr_week[date('w')];

if (!isset($_SESSION["base"]) || empty($_SESSION["base"])) {
  $baseStr = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/json/base.json");
  $baseArr = json_decode($baseStr, true);
  $_SESSION["base"] = $baseArr;
}
$baseArr = $_SESSION["base"];