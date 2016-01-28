<?php

/* @var $this yii\web\View */
$this->title = '首页';
?>
<!-- <div class="t_min t_tit">当前位置：<a href="#">首页</a></div> -->
   <style>
    #slides,
    #slides2,
    #slides3 {
      display: none;
      margin-bottom:50px;
    }

    .slidesjs-navigation {
      margin-top:3px;
    }

    .slidesjs-previous {
      margin-right: 5px;
      float: left;
    }

    .slidesjs-next {
      margin-right: 5px;
      float: left;
    }

    .slidesjs-pagination {
      margin: 6px 0 0;
      z-index: 200;
      
      list-style: none;
      position: absolute;
      left: 47%;
    }

    .slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }

    .slidesjs-pagination li a {
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(/public/images/banner-logo/pagination.png);
      background-position: 0 0;
      float: left;
      overflow: hidden;
    }

    .slidesjs-pagination li a.active,
    .slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }

    .slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }

    a:link,
    a:visited {
      color: #333
    }

    a:hover,
    a:active {
      color: #9e2020
    }

    .navbar {
      overflow: hidden
    }  

    .top_roll_pic {
        position: static;
        z-index: 99;        
    }

    .t_imgli1 {
        z-index: 100;
    }
  </style>
    <div class="t_img" id="scrolldiv" style='height:400px; background: #FFFFFF;'>
        <!-- <div class="t_imglibt ">
            <span class="bg">
                <a href="  javascript:;" onclick="setscroll(0);"></a>
            </span> 
            <span>
                <a href="javascript:;" onclick="setscroll(1);"></a>
            </span> 
            <span>
                <a href="javascript:;" onclick="setscroll(2);"></a>
            </span>
        </div> -->

        <div id="top_roll_pic" style="margin-top: 8px;">
            <img class='t_imgli1' src="/public/images/banner-logo/1fb51f11cb41355168fd965e34898560.jpg" alt="">
            <img class='t_imgli1' src="/public/images/banner-logo/2b2781dfd70fee07b83da520bf66e40e.jpg" alt="">
            <img class='t_imgli1' src="/public/images/banner-logo/fdb1313a1e6c23b009f3fbd634b1825f.jpg" alt="">            
        </div>
    </div>
    <!--t_box-->
    <div class="t_box">
        <div class="t_boxi t_min">
            <ul>
                <li><b class="b1"></b><a href="#">安全保障</a>保证金模式<br> <strong>保障兼职回报</strong></li>
                <li><b class="b2"></b><a href="#">资质认证</a>企业、大学生<br> <strong>审核机制</strong></li>
                <li><b class="b3"></b><a href="#">行业引领</a>构建新时代<br> <strong>学生兼职模式</strong></li>
                <li><b class="b4"></b><a href="#">免费</a>商家免费发布入驻<br> <strong>学生免费获得兼职职位</strong></li>
                <li><b class="b5"></b><a href="#">励志</a>用自己的双手<br> <strong>创造财富</strong></li>
                <li><b class="b6"></b><a href="#">积累</a>工作经验积累<br> <strong>信用积累</strong></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <!--t_box end-->
    <!--t_frdl-->
    <div class="t_frdl">
    <div class="t_frdli t_min">
    <h1>他们也喜欢我们</h1>
    <a href="http://progstartup.com/" target="_blank"><img src="/public/images/textimg/l1.jpg" height="80" width="158"></a>
    <a href="#"><img src="/public/images/textimg/l7.jpg" height="80" width="158"></a>
    <a href="#"><img src="/public/images/textimg/l7.jpg" height="80" width="158"></a>
    <a href="#"><img src="/public/images/textimg/l7.jpg" height="80" width="158"></a>
    <a href="#"><img src="/public/images/textimg/l7.jpg" height="80" width="158"></a>
    <a href="#"><img src="/public/images/textimg/l7.jpg" height="80" width="158"></a>
    <a href="#" class="nmad"><img src="/public/images/textimg/l7.jpg" height="80" width="158"></a></div>
    <div class="clear"></div>
    </div>
    
    <!--frdl end-->
    <script type='text/javascript' src="/public/js/jquery.slides.min.js"></script>
    
    <script>
        $('#top_roll_pic').slidesjs({
        width: 940,
        height: 260,
        navigation: false,
        start: 3,
        play: {
          auto: true
        }
      });
    </script>
