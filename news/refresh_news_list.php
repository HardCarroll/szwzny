<?php
if (isset($_GET['cls']) && !empty($_GET['cls']) && isset($_GET['page']) && !empty($_GET['page'])) {
  $cls = $_GET['cls'];
  $page = $_GET['page'];
  
  require($_SERVER["DOCUMENT_ROOT"]."/cms/lib.php");
  $dbo = new DBOperator("localhost", "wzny_admin", "szwzny.com", "szwzny");
  if ($dbo->state["err_no"]) {
    // 数据库连接失败
    echo "数据库连接失败！<br>".$dbo->state["err_code"];
    exit;
  }
  $sql = "SELECT * FROM tab_news WHERE class=$cls ORDER BY nid ASC";
  $result = $dbo->exec_query($sql);
  if(!$result || $dbo->state["err_no"]) {
    if (empty($dbo->state["err_code"])) {
      // 没有结果集
      echo "暂时没有发布相关动态！";
      exit;
    }
    echo "请检查SQL语句！<br>".$dbo->state["err_code"];
    exit;
  }

  $counts = count($result);
  $cmp = $counts / ($page*10) >= 1 ? 10 : ($counts%10);
  $html = '';
  if (isset($_GET["token"]) && !empty($_GET["token"]) && "cms_mod_news" === $_GET["token"]) {
    for ($i = ($page-1)*10; $i < ($page-1)*10+$cmp; $i++) {
      $html .= '<li class="list-group-item clearfix">';
      $html .= $result[$i]['title'];
      $html .= '<div class="control pull-right">';
      $html .= '<a href="/cms/cms_content.php?token=edit&nid='.$result[$i]['nid'].'" class="btn btn-default glyphicon glyphicon-pencil"></a>';
      $html .= '<a href="javascript:remove_news('.$result[$i]['nid'].');" class="btn btn-default glyphicon glyphicon-trash"></a>';
      $html .= '</div></li>';
    }
  }
  else {
    for ($i = ($page-1)*10; $i < ($page-1)*10+$cmp; $i++) {
      $html .= '<li><a href="/news/content.php?cls='.$result[$i]["class"].'&nid=' . $result[$i]['nid'] . '">';
      $html .= '<h2 class="news-title">' . $result[$i]['title'] . '</h2>';
      $html .= '<span class="issue-date">' . $result[$i]['issue'] . '</span>';
      $html .= '</a></li>';
    }
  }
  
  echo $html;
  exit;
}
else {
  echo "请检查HTTP请求参数！";
  exit;
}

