<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<link rel="stylesheet" href="/public/css/style.css" />
<link rel="stylesheet" href="/public/css/common.css" />
<link rel="stylesheet" type="text/css" href="/public/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="/public/css/start.css" />
<script type="text/javascript" src="/public/js/jquery-1.11.3.min.js"></script>
<style type="text/css">
        .tr:nth-of-type(even) {
             background: #F6F6F4;
            cursor: pointer;
        }

        .tr:nth-of-type(odd) {
           
            cursor: pointer;
        }
    </style>
<title><?= Html::encode($this->title) ?></title>
<!--head-->
    <div class="head">
        <div class="t_min header">
            <div class="t_le">欢迎光临趣淘学<b>北京<a href="#">[切换城市]</a></b></div>
            <div class="t_ri">
                <span><a href="zhuce.html">注册 |</a> <a href="denglu.html" class="a1">登陆</a></span>
                <span class="mtx"><a href="<?= Url::to(['user/index']); ?>">我的趣淘学</a></span>
                <span> <a href="#">帮助中心</a></span>
                <span class="app"><a href="#">APP</a></span>
            </div>
        </div>
    </div>
    <!--head end-->
    <!--t_nav-->
    <div class="t_nav">
        <div class="t_navy"></div>
        <div class="t_navi t_min">
            <div class="t_navb"></div>
            <div class="t_le"><a href="index.html" title="趣淘学"><img src="/public/images/logo.png" width="213" height="90" border="0" /></a></div>
            <div class="t_le">
                <ul>
                    <li class="menu bg"><a href="<?= Url::to(['site/index']); ?>">首&nbsp;&nbsp;页</a></li>
                    <li class="menu"><a href="<?= Url::to(['merchants/index']); ?>">优质商家</a></li>
                    <li class="menu"><a href="<?= Url::to(['parttime/index']); ?>" >兼职机会</a></li>
                    <li class="menu"><a href="<?= Url::to(['safety/index']); ?>" >安全保障</a></li>
                    <li class="menu"><a href="<?= Url::to(['about/index']); ?>">关于我们</a></li>
                </ul>
            </div>
            <div class="t_le so">
                <input name="" type="text"  class="it"/><input name="" type="button"  class="bt"/>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<!--t_nav end-->
</head>
<!-- body -->
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
<!-- body end-->
<!--foot footer-->
<div class="foot">
    <div class="footi t_min">
        <ul>
            <li>
                <h1>关于我们</h1>
                <p>趣淘学介绍们</p>
                <p>关于我们</p>
                <p>联系我们</p>
            </li>
            <li>
                <h1>服务指南</h1>
                <p>趣淘学介绍们</p>
                <p>关于我们</p>
                <p>联系我们</p>
            </li>
            <li>
                <h1>帮助中心</h1>
                <p>常见问题</p>
                <p>会员注册</p>
                <p>会员登陆</p>
            </li>
            <li>
                <h1>服务热线</h1>
                <p>010-123456789</p>
                <p>周一至周五6:30-18:00</p>
                <p>邮箱:123@123.com</p>
                <p>QQ一群:789456123</p>
                <p>QQ二群:123456789</p>
            </li>
            <li class="nbo">
                <h1>关注二维码</h1>
                <p><img src="/public/images/er_01.jpg" width="80" height="80" />&nbsp;&nbsp;<img src="/public/images/er_02.jpg" width="80" height="80" /></p>
                <p>下载APP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;关注微信</p>
            </li>
        </ul>
    <div class="clear "></div>
    </div>
</div>
<div class="footer">
    <div class="footeri t_min">
        <p>京ICP备15001122 qutaoxue 2015-2018 优时梦想网络科技（北京）有限公司</p>
        <p>
            <img src="/public/images/textimg/b_01.jpg" width="112" height="40" />&nbsp;&nbsp;
            <img src="/public/images/textimg/b_02.jpg" width="129" height="40" />&nbsp;&nbsp;
            <img src="/public/images/textimg/b_03.jpg" width="129" height="40" />&nbsp;&nbsp;
            <img src="/public/images/textimg/b_01.jpg" width="112" height="40" />&nbsp;&nbsp;
            <img src="/public/images/textimg/b_02.jpg" width="129" height="40" />&nbsp;&nbsp;
            <img src="/public/images/textimg/b_03.jpg" width="129" height="40" />
        </p>
    </div>
</div>
<!--foot footer end-->

</html>
<?php $this->endPage() ?>

<script>
    $(document).on('click','.menu',function () {
        $('.menu').attr('class','menu');
        $(this).attr('class','menu bg');
    })
</script>
