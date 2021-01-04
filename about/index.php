<?php
date_default_timezone_set("Asia/Shanghai");
$arr_week=array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
$date_str = "Y年m月d日 ".$arr_week[date('w')];
$baseStr = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/json/base.json");
$baseArr = json_decode($baseStr, true);
if(isset($_GET['token']) && !empty($_GET['token'])) {
  switch ($_GET['token']) {
    case 1:
      $title = "公司概况";
      break;
    case 2:
      $title = "组织架构";
      break;
    case 3:
      $title = "战略愿景";
      break;
  }
}
else {
  $title = "公司概况";
}
?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="Description" content="洈洲农业发展有限公司,是一家以现代农业科技为根本，以建设城郊型现代农业为重点，以服务城市、繁荣农村、提升农业和富裕农民为目标的公司。公司下设扶贫产业基地：绿欣稻虾合作社、洈洲椪柑合作社、椒丰花椒合作社、洈洲林木花卉基地、洈洲中药材合作社、银景湖休闲度假基地、安飞机械设备部、洈洲渔业基地、荆红湾酒业...">
<meta name="Keywords" content="洈洲农业发展有限公司,松滋市洈洲农业发展有限公司,洈洲农业发展有限公司官网,洈洲农业发展有限公司官方网站">
<title><?php echo $title; ?>，关于洈洲农业发展有限公司</title>
<link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
</head>

<body>
<!--  头部区域-->
  <section class="fixed-top">
    <div class="header">
      <div class="hd-logo">
        <a href="/"><img src="/src/logo.png" alt="洈洲农业发展有限公司"></a>
      </div>
      <div class="hd-slogan">
        <p>洈农&nbsp;&nbsp;&nbsp;&nbsp;为农而生</p>
        <p>全国服务热线：<?php echo $baseArr["service-tel"] ?></p>
      </div>
      <div class="hd-qrcode">
        <p><img src="/src/qrcode_mine.jpg" alt="洈洲农业发展有限公司"></p>
        <span>关注我们</span>
      </div>
    </div>
    <div class="navbar">
      <ul class="nav-list">
        <li class="items"><a href="/">首页</a></li>
        <li class="items current">
          <a href="/about/">走进洈农</a>
          <ol>
            <li><a href="/about/index.php?token=1">公司概况</a></li>
            <li><a href="/about/index.php?token=2">组织架构</a></li>
            <li><a href="/about/index.php?token=3">战略愿景</a></li>
          </ol>
        </li>
        <li class="items">
          <a href="/news/index.php?cls=1">新闻资讯</a>
          <ol>
            <li><a href="/news/index.php?cls=1">通知公告</a></li>
            <li><a href="/news/index.php?cls=2">公司要闻</a></li>
            <li><a href="/news/index.php?cls=3">综合新闻</a></li>
          </ol>
        </li>
        <li class="items">
          <a href="/product/">产品服务</a>
        </li>
        <li class="items">
          <a href="/recruit/">人才招聘</a>
        </li>
        <li class="items">
          <a href="/contact/">联系我们</a>
        </li>
      </ul>
    </div>
  </section>
<!--  中间内容版块-->
  <section class="page">
    <div class="sub-banner">
      <img src="/src/sub_img_04.jpg" alt="洈洲农业发展有限公司">
    </div>
    <div class="ct-wrap">
      <section class="ct-left">
        <div class="ct-tabs">
          <h3 class="tab-title">走进洈农</h3>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs ct-tab-list" role="tablist">
            <li class="<?php if(!isset($_GET['token']) || empty($_GET['token']) || $_GET['token']==1){echo 'active';}?>"><a href="/about/index.php?token=1">公司概况</a></li>
            <li class="<?php if(isset($_GET['token']) && !empty($_GET['token']) && $_GET['token']==2){echo 'active';}?>"><a href="/about/index.php?token=2">组织架构</a></li>
            <li class="<?php if(isset($_GET['token']) && !empty($_GET['token']) && $_GET['token']==3){echo 'active';}?>"><a href="/about/index.php?token=3">战略愿景</a></li>
          </ul>
        </div>
<!--          联系我们-->
        <div class="contact">
          <h3 class="con-title">联系我们</h3>
          <section class="con-detail">
            <p class="tel">电话：<span><?php echo $baseArr["tel"] ?></span></p>
            <p class="fax">传真：<span><?php echo $baseArr["fax"] ?></span></p>
            <p class="e-mail">邮箱：<span><?php echo $baseArr["e-mail"] ?></span></p>
            <p class="addr">地址：<span><?php echo $baseArr["addr"] ?></span></p>
          </section>
        </div>
      </section>
      <section class="ct-right">
        <div class="cur-location">
          <ol class="breadcrumb location">
            <span class="glyphicon glyphicon-map-marker"></span>
            <p class="title">当前位置</p>
            <li><a href="/">首页</a></li>
            <li><a href="/about/">走进洈农</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </div>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane <?php if(!isset($_GET['token']) || empty($_GET['token']) || $_GET['token']==1){echo 'active';}?>">
            <section class="sub-content">
              <p class="sub-text">洈洲农业发展有限公司于2018年10月19日正式注册成立，总投资1000万元，是一家以现代农业科技为根本，以建设城郊型现代农业为重点，以服务城市、繁荣农村、提升农业和富裕农民为目标的公司。</p>
              <p class="sub-text">公司经营范围：农林牧渔业、种养殖业、工程建筑业、旅游业。</p>
              <p class="sub-text">公司下设扶贫产业基地：绿欣稻虾合作社、洈洲椪柑合作社、椒丰花椒合作社、洈洲林木花卉基地、洈洲中药材合作社、银景湖休闲度假基地、安飞机械设备部、洈洲渔业基地、荆红湾酒业......</p>
              <p class="sub-image">
                <img src="/src/location.jpg" alt="洈洲农业发展有限公司卫星地图">
              </p>
              <p class="sub-image">
                <img src="/src/yyzz.jpg" alt="洈洲农业发展有限公司营业执照">
              </p>
            </section>
          </div>
          <div class="tab-pane <?php if(isset($_GET['token']) && !empty($_GET['token']) && $_GET['token']==2){echo 'active';}?>">
            <section class="sub-content" id="abt-struct">
              <p class="sub-image">
                <img src="/src/struct.png" alt="洈洲农业发展有限公司组织架构">
              </p>
            </section>
          </div>
          <div class="tab-pane <?php if(isset($_GET['token']) && !empty($_GET['token']) && $_GET['token']==3){echo 'active';}?>">
            <section class="sub-content">
              <p class="sub-text">为了全面落实乡村振兴战略，加快对郑家铺村国土18.7平方公里、耕地2841亩、山林22225亩的开发，带动郑家铺村发展和乡村旅游，加快推进社会主义新农村建设，积极响应【中共中央国务院关于打赢脱贫攻坚战三年行动的指导意见】精神，带动郑家铺村精准扶贫户就业脱贫共同发展，真正把“纸上政策”变为“真金白银”，把“纸上产业”变为“地上产业”。</p>
              <p class="sub-image"><img src="/src/gh.jpg" alt="洈洲农业发展有限公司战略愿景"></p>
              <p class="sub-image"><img src="/src/zl.jpg" alt="洈洲农业发展有限公司战略愿景"></p>
            </section>
          </div>
        </div>
      </section>
    </div>
  </section>
  
<!--  脚注区域-->
  <section class="ft-wrap">
    <div class="footer">
      <p>Copyright © 2018-2019&nbsp;<a href="/index.php">洈洲农业发展有限公司</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://beian.miit.gov.cn"><i class="ico ico-ba"></i>鄂ICP备18027002号-1</a></p>
      <p>为保证最佳浏览效果，请在PC端访问本站</p>
    </div>
  </section>
  
  
<script type="text/javascript" src="/lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/common.min.js"></script>
<script>
  // (function(){
  //   var bp = document.createElement('script');
  //   var curProtocol = window.location.protocol.split(':')[0];
  //   if (curProtocol === 'https') {
  //       bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
  //   }
  //   else {
  //       bp.src = 'http://push.zhanzhang.baidu.com/push.js';
  //   }
  //   var s = document.getElementsByTagName("script")[0];
  //   s.parentNode.insertBefore(bp, s);
  // })();
</script>
</body>
</html>