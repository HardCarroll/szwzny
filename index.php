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
<title>洈洲农业发展有限公司-官方网站</title>
<link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
</head>

<body>
<!--  头部区域 -->
  <section class="fixed-top">
    <div class="header">
      <div class="hd-logo">
        <a href="/"><img src="/src/logo.png" alt="洈洲农业发展有限公司LOGO图片"></a>
      </div>
      <div class="hd-slogan">
        <p>洈农&nbsp;&nbsp;&nbsp;&nbsp;为农而生</p>
        <p>全国服务热线：<?php echo $baseArr["service-tel"] ?></p>
      </div>
      <div class="hd-qrcode">
        <p><img src="/src/qrcode_mine.jpg" alt="洈洲农业发展有限公司公众号二维码图片"></p>
        <span>关注我们</span>
      </div>
    </div>
    <div class="navbar">
      <ul class="nav-list">
        <li class="items current"><a href="/">首页</a></li>
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
  <!--  轮播大图-->
    <section id="banner" class="carousel slide carousel-custom" data-ride="carousel"> 
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#banner" data-slide-to="0" class="active"></li>
        <li data-target="#banner" data-slide-to="1"></li>
        <li data-target="#banner" data-slide-to="2"></li>
        <li data-target="#banner" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active"><img src="/src/b_img_01.jpg" alt="洈洲农业发展有限公司广告轮播大图01"></div>
        <div class="item"><img src="/src/b_img_02.jpg" alt="洈洲农业发展有限公司广告轮播大图02"></div>
        <div class="item"><img src="/src/b_img_03.jpg" alt="洈洲农业发展有限公司广告轮播大图03"></div>
        <div class="item"><img src="/src/b_img_04.jpg" alt="洈洲农业发展有限公司广告轮播大图04"></div>
      </div>

      <!-- Controls --> 
      <a class="left carousel-control" href="#banner" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#banner" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </section>
    
    <section class="ad-full">
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
    </section>

  <!--  内容区域，分为左右两块-->
    <section class="ct-wrap">
      <div class="ct-left">
<!--          视频资讯-->
        <div class="dis-video">
          <h3 class="video-title">视频资讯</h3>
          <div class="video-source">
            <video width="100%" preload="meta" controls="control">
              <source src="/src/video.mp4" />
            </video>
          </div>
        </div>
<!--          人物简介-->
        <div class="description">
          <h3 class="des-title">创始人简介</h3>
          <a class="des-detail" href="javascript:;">
            <div class="des-img"><img src="/src/mgr.jpg" alt="洈洲农业发展有限公司的创始人图片"></div>
            <div class="des-text">
              <h4>总经理：<span>覃安心</span></h4>
              <p>毕业于工商管理学院，长期在国企、外企工作，曾在日本本田公司工作21年，2017年回家乡发展，现任洈洲农业发展有限公司董事兼总经理及中共松滋市刘家场镇郑家铺村委会主任。</p>
            </div>
          </a>
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
<!--          人才招聘-->
        <div class="recruit">
          <h3 class="rec-title">人才招聘</h3>
          <ul class="rec-list" id="rec-list">
<!--            动态生成招聘信息列表-->
<!--
            <li>
              <span>采购专员</span>
              <a href="javascript:;">详情</a>
            </li>
            <li>
              <span>客服专员</span>
              <a href="javascript:;">详情</a>
            </li>
            <li>
              <span>行政专员</span>
              <a href="javascript:;">详情</a>
            </li>
-->
          </ul>
        </div>
        <a href="/cms/" class="btn btn-default btn-login">
          <span class="glyphicon glyphicon-briefcase"></span>
          <span>办公入口</span>
        </a>
      </div>
      <div class="ct-right">
<!--          关于我们-->
        <div class="about">
          <h2 class="abt-title"><span>关于我们</span><a href="/about/">更多</a></h2>
          <section class="abt-detail">
            <div class="abt-text">
              <p><a href="/">洈洲农业发展有限公司</a>于2018年10月19日正式注册成立，总投资1000万元，是一家以现代农业科技为根本，以建设城郊型现代农业为重点，以服务城市、繁荣农村、提升农业和富裕农民为目标的公司。
              </p>
              <p>
                公司经营范围：农林牧渔业、种养殖业、工程建筑业、旅游业；公司下设扶贫产业基地：绿欣稻虾合作社、洈洲椪柑合作社、椒丰花椒合作社、洈洲林木花卉基地、洈洲中药材合作社、银景湖休闲度假基地、安飞机械设备部、洈洲渔业基地、荆红湾酒业......
              </p>
            </div>
            <div class="abt-img"><img src="/src/img-cpny.jpg" alt="关于洈洲农业发展有限公司"></div>
          </section>
        </div>
<!--          战略愿景-->
        <div class="expect">
          <h2 class="exp-title"><span>战略愿景</span><a href="/about/index.php?token=3">更多</a></h2>
          <section class="exp-detail">
            <div class="exp-text">
              <p>为了全面落实乡村振兴战略，加快对郑家铺村国土18.7平方公里、耕地2841亩、山林22225亩的开发，带动郑家铺村发展和乡村旅游，加快推进社会主义新农村建设，积极响应【中共中央国务院关于打赢脱贫攻坚战三年行动的指导意见】精神，带动郑家铺村精准扶贫户就业脱贫共同发展，真正把“纸上政策”变为“真金白银”，把“纸上产业”变为“地上产业”。</p>
            </div>
          </section>
        </div>
<!--          产品服务-->
        <div class="products">
          <h2 class="pro-title"><span>产品服务</span><a href="/product/">更多</a></h2>
          <div class="pro-carousel">
            <ul class="carousel-wrap">
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_02.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地02">
                  <p>郑家铺村庄</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_01.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地01">
                  <p>花椒基地</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_05.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地05">
                  <p>大自然原生态蜂蜜</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_12.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地01">
                  <p>大自然原生态蜂蜜</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_06.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地06">
                  <p>洈洲香虾稻米</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_07.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地07">
                  <p>荆红湾酒业</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_08.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地08">
                  <p>荆红湾酒业</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_09.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地09">
                  <p>潭口渔业小龙虾</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_10.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地01">
                  <p>中药材基地</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_11.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地01">
                  <p>五家湾林木基地</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_03.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地03">
                  <p>水上渔者</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_13.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地03">
                  <p>洈水风光</p>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <img src="/src/pro_img_04.jpg" alt="松滋市洈洲农业发展有限公司下设扶贫产业基地04">
                  <p>卫星地图</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
<!--          新闻中心-->
        <div class="news">
          <h2 class="news-title">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
              <li role="presentation" class="active">
                <a href="#news-cpy" aria-controls="news-cpy" role="tab" data-toggle="tab">公司要闻</a>
              </li>
              <li role="presentation">
                <a href="#news-all" aria-controls="news-all" role="tab" data-toggle="tab">综合新闻</a>
              </li>
            </ul>
          </h2>
          <!-- Tab panes -->
          <div class="tab-content">
<!--              公司要闻tab-->
            <section role="tabpanel" class="tab-pane active" id="news-cpy">
              <ul class="news-list" id="cpy-list">
<!--              动态生成新闻列表-->
              </ul>
<!--
              <ul class="news-list">
                <li>
                  <a href="#">
                    <h2 class="news-title">2018年10月25日，官网首页制作完成。</h2>
                    <span class="issue-date">2018/10/22</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h2 class="news-title">2018年10月24日，官网首页制作修改中。</h2>
                    <span class="issue-date">2018/10/22</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h2 class="news-title">2018年10月23日，官方网站首页制作中。</h2>
                    <span class="issue-date">2018/10/22</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h2 class="news-title">2018年10月22日，开始筹备公司官网上线工作。</h2>
                    <span class="issue-date">2018/10/22</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h2 class="news-title">2018年10月19日，洈洲农业发展有限公司正式注册成立。</h2>
                    <span class="issue-date">2018/10/19</span>
                  </a>
                </li>
              </ul>
-->
            </section>
<!--              综合新闻tab-->
            <section role="tabpanel" class="tab-pane" id="news-all">
              <ul class="news-list" id="all-list">
<!--              动态生成新闻列表-->
              </ul>
<!--
              <ul class="news-list">
                <li>
                  <a href="#">
                    <h2 class="news-title">综合新闻第一条标题。</h2>
                    <span class="issue-date">2018/10/22</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h2 class="news-title">综合新闻第二条标题。</h2>
                    <span class="issue-date">2018/10/19</span>
                  </a>
                </li>
              </ul>
-->
            </section>
          </div>
        </div>
      </div>
    </section>
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
<script type="text/javascript" src="/js/main.min.js"></script>
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