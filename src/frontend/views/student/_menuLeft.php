
<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>

<div class="mt_le t_le" id="leftmenus">
	<a href="<?= Url::to(['student/index']); ?>" atr="index">
		<h1> 我的趣淘学  </h1>
	</a>
	<ul> 
	<li><a href="<?= Url::to(['student/goodsorder']); ?>" atr="goodsorder">我的订单</a></li>
	<li><a href="<?= Url::to(['student/partorder']); ?>" atr="partorder">我的兼职</a></li> 
	<li><a href="<?= Url::to(['student/comment']); ?>" atr="comment">我的评论</a></li> 
	<h2>个人设置</h2>
	<li><a class="co" href="<?= Url::to(['student/info']); ?>" atr="info">基本资料</a></li>       
	<li><a href="<?= Url::to(['student/security']); ?>" atr="security">账户安全</a></li>  
	<li> <a href="<?= Url::to(['student/balance']); ?>" atr="balance">账户余额</a></li>   
	</ul>
</div>