<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/common.php");
?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="Description" content="洈洲农业发展有限公司,是一家以现代农业科技为根本，以建设城郊型现代农业为重点，以服务城市、繁荣农村、提升农业和富裕农民为目标的公司。公司下设扶贫产业基地：绿欣稻虾合作社、洈洲椪柑合作社、椒丰花椒合作社、洈洲林木花卉基地、洈洲中药材合作社、银景湖休闲度假基地、安飞机械设备部、洈洲渔业基地、荆红湾酒业...">
<meta name="Keywords" content="洈洲农业发展有限公司,松滋市洈洲农业发展有限公司,洈洲农业发展有限公司官网,洈洲农业发展有限公司官方网站">
<title>人才招聘，洈洲农业发展有限公司</title>
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
        <li class="items">
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
        <li class="items current">
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
      <img src="/src/sub_img_05.jpg" alt="洈洲农业发展有限公司">
    </div>
    
    <div class="ad-full">
      <span class="glyphicon glyphicon-bullhorn ad-icon"></span>
      <div class="ad-content">
        <ul class="ad-list">
          <?php
          for($n=0; $n<count($adsArr); $n++) {
            echo "<li><a href='javascript:;'>".$adsArr[$n]."</a></li>";
          }
          ?>
          <!-- <li><a href="javascript:;">2018年10月19日，洈洲农业发展有限公司正式注册成立。</a></li>
          <li><a href="javascript:;">2018年10月22日，开始筹备官网上线工作。</a></li>
          <li><a href="javascript:;">2018年10月29日，官方网站域名szwzny.com正式注册。</a></li> -->
        </ul>
      </div>
      <p class="ad-curtime">
        <span>今天是 <?php echo date($date_str); ?></span>
      </p>
    </div>
    
    <div class="ct-wrap">
      <section class="ct-left">
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
            <li><a href="/recruit/">人才招聘</a></li>
            <li class="active">职位简介</li>
          </ol>
        </div>
<!--        职位信息-->
        <div class="recruit-tab">
          <table class="table table-hover">
            <thead>
              <tr>
                <td>#</td>
                <td>招聘职位</td>
                <td>工作地点</td>
                <td>发布日期</td>
                <td>详细信息</td>
              </tr>
            </thead>
            <tbody>
              <!-- 动态生成职位列表 -->
            </tbody>
          </table>
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
<script type="text/javascript" src="/js/recruit.min.js"></script>
<script type="text/javascript">
  
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