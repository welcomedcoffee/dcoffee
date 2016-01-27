<?php
use yii\helpers\Url;
use frontend\models\consumption\Merchant;
$user_id = 1;
$merchant = new Merchant;
$base = $merchant->getMerchant($user_id);
?>
<div class="t_min t_tit">当前位置：<a href="<?= Url::to(['site/index'])?>">首页</a> > 我的门店</div>
<!--我的趣淘学-->
<div class="t_min">
<div class="mt_le t_le">
<h1>我的门店</h1>
<ul>
<li><a href="<?= Url::to(['consumption/order'])?>" class="co">我的订单</a></li>
<li><a href="<?= Url::to(['consumption/comment'])?>">订单评论</a></li>
<li><a href="<?= Url::to(['consumption/preferential'])?>">优惠活动</a></li>
<h2>个人设置</h2>
<li><a href="<?= Url::to(['consumption/basedata'])?>">基本资料</a></li>
<li><a href="<?= Url::to(['consumption/security'])?>">账户安全</a></li>
<li> <a href="<?= Url::to(['consumption/limoney'])?>">账户余额</a></li>
</ul>
</div>
<div class="mt_ri t_ri">
<div class="mt_rt">
<ul>
<li class="img"> <img src="/public/images/us.jpg" width="100" height="100" /></li>
<li class="wi1">
<h1><?php echo $base->mer_name?></h1>
<p><?php echo $base->mer_phone?></p>
</li>
<li class="wi2">&nbsp;</li>
<!-- <li class="wi3">
<a href="#"><span class="bg1">额度申请</span></a>
<a href="#"><span class="bg2">兼职结算</span></a>
<a href="#"><span class="bg3">兼职审核</span></a></li> -->
</ul>
<div class="clear"></div>
</div>