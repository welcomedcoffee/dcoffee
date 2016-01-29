
<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
$fun = $this->context->action->id;
?>

<div class="mt_le t_le" id="leftmenus">
<?php if ($fun == 'index') { ?>
	<a href="<?= Url::to(['student/index']); ?>" atr="index">
		<h1> 我的趣淘学  </h1>
	</a>
	<ul> 
		<li><a href="<?= Url::to(['student/goodsorder']); ?>" atr="goodsorder">我的订单</a></li>
		<li><a href="<?= Url::to(['student/partorder']); ?>" atr="partorder">我的兼职</a></li> 
		<li><a href="<?= Url::to(['student/comment']); ?>" atr="comment">商品评论</a></li>
		<li><a href="<?= Url::to(['student/partcomment']); ?>" atr="partcomment">兼职评论</a></li>
		<h2>个人设置</h2>
		<li><a href="<?= Url::to(['student/info']); ?>" atr="info">基本资料</a></li>       
		<li><a href="<?= Url::to(['student/security']); ?>" atr="security">账户安全</a></li>  
		<li><a href="<?= Url::to(['student/balance']); ?>" atr="balance">账户余额</a></li>   
	</ul>
<?php }elseif ($fun == 'goodsorder') { ?>
	<a href="<?= Url::to(['student/index']); ?>" atr="index">
		<h1> 我的趣淘学  </h1>
	</a>
	<ul> 
		<li><a class="co" href="<?= Url::to(['student/goodsorder']); ?>" atr="goodsorder">我的订单</a></li>
		<li><a href="<?= Url::to(['student/partorder']); ?>" atr="partorder">我的兼职</a></li> 
		<li><a href="<?= Url::to(['student/comment']); ?>" atr="comment">商品评论</a></li>
		<li><a href="<?= Url::to(['student/partcomment']); ?>" atr="partcomment">兼职评论</a></li>
		<h2>个人设置</h2>
		<li><a href="<?= Url::to(['student/info']); ?>" atr="info">基本资料</a></li>       
		<li><a href="<?= Url::to(['student/security']); ?>" atr="security">账户安全</a></li>  
		<li><a href="<?= Url::to(['student/balance']); ?>" atr="balance">账户余额</a></li>   
	</ul>
<?php }elseif ($fun == 'partorder') { ?>
	<a href="<?= Url::to(['student/index']); ?>" atr="index">
		<h1> 我的趣淘学  </h1>
	</a>
	<ul> 
		<li><a href="<?= Url::to(['student/goodsorder']); ?>" atr="goodsorder">我的订单</a></li>
		<li><a class="co" href="<?= Url::to(['student/partorder']); ?>" atr="partorder">我的兼职</a></li> 
		<li><a href="<?= Url::to(['student/comment']); ?>" atr="comment">商品评论</a></li>
		<li><a href="<?= Url::to(['student/partcomment']); ?>" atr="partcomment">兼职评论</a></li>
		<h2>个人设置</h2>
		<li><a href="<?= Url::to(['student/info']); ?>" atr="info">基本资料</a></li>       
		<li><a href="<?= Url::to(['student/security']); ?>" atr="security">账户安全</a></li>  
		<li><a href="<?= Url::to(['student/balance']); ?>" atr="balance">账户余额</a></li>   
	</ul>
<?php }elseif ($fun == 'comment') { ?>
	<a href="<?= Url::to(['student/index']); ?>" atr="index">
		<h1> 我的趣淘学  </h1>
	</a>
	<ul> 
		<li><a href="<?= Url::to(['student/goodsorder']); ?>" atr="goodsorder">我的订单</a></li>
		<li><a href="<?= Url::to(['student/partorder']); ?>" atr="partorder">我的兼职</a></li> 
		<li><a class="co" href="<?= Url::to(['student/comment']); ?>" atr="comment">商品评论</a></li>
		<li><a href="<?= Url::to(['student/partcomment']); ?>" atr="partcomment">兼职评论</a></li>
		<h2>个人设置</h2>
		<li><a href="<?= Url::to(['student/info']); ?>" atr="info">基本资料</a></li>       
		<li><a href="<?= Url::to(['student/security']); ?>" atr="security">账户安全</a></li>  
		<li><a href="<?= Url::to(['student/balance']); ?>" atr="balance">账户余额</a></li>   
	</ul>
<?php }elseif ($fun == 'partcomment') { ?>
	<a href="<?= Url::to(['student/index']); ?>" atr="index">
		<h1> 我的趣淘学  </h1>
	</a>
	<ul> 
		<li><a href="<?= Url::to(['student/goodsorder']); ?>" atr="goodsorder">我的订单</a></li>
		<li><a href="<?= Url::to(['student/partorder']); ?>" atr="partorder">我的兼职</a></li> 
		<li><a href="<?= Url::to(['student/comment']); ?>" atr="comment">商品评论</a></li>
		<li><a class="co" href="<?= Url::to(['student/partcomment']); ?>" atr="partcomment">兼职评论</a></li>
		<h2>个人设置</h2>
		<li><a href="<?= Url::to(['student/info']); ?>" atr="info">基本资料</a></li>       
		<li><a href="<?= Url::to(['student/security']); ?>" atr="security">账户安全</a></li>  
		<li><a href="<?= Url::to(['student/balance']); ?>" atr="balance">账户余额</a></li>   
	</ul>
<?php }elseif ($fun == 'info' || $fun == 'headportrait') { ?>
	<a href="<?= Url::to(['student/index']); ?>" atr="index">
		<h1> 我的趣淘学  </h1>
	</a>
	<ul> 
		<li><a href="<?= Url::to(['student/goodsorder']); ?>" atr="goodsorder">我的订单</a></li>
		<li><a href="<?= Url::to(['student/partorder']); ?>" atr="partorder">我的兼职</a></li> 
		<li><a href="<?= Url::to(['student/comment']); ?>" atr="comment">商品评论</a></li>
		<li><a href="<?= Url::to(['student/partcomment']); ?>" atr="partcomment">兼职评论</a></li>
		<h2>个人设置</h2>
		<li><a class="co" href="<?= Url::to(['student/info']); ?>" atr="info">基本资料</a></li>       
		<li><a href="<?= Url::to(['student/security']); ?>" atr="security">账户安全</a></li>  
		<li><a href="<?= Url::to(['student/balance']); ?>" atr="balance">账户余额</a></li>   
	</ul>
<?php }elseif ($fun == 'security' || $fun == 'studentsave') { ?>
	<a href="<?= Url::to(['student/index']); ?>" atr="index">
		<h1> 我的趣淘学  </h1>
	</a>
	<ul> 
		<li><a href="<?= Url::to(['student/goodsorder']); ?>" atr="goodsorder">我的订单</a></li>
		<li><a href="<?= Url::to(['student/partorder']); ?>" atr="partorder">我的兼职</a></li> 
		<li><a href="<?= Url::to(['student/comment']); ?>" atr="comment">商品评论</a></li>
		<li><a href="<?= Url::to(['student/partcomment']); ?>" atr="partcomment">兼职评论</a></li>
		<h2>个人设置</h2>
		<li><a href="<?= Url::to(['student/info']); ?>" atr="info">基本资料</a></li>       
		<li><a class="co" href="<?= Url::to(['student/security']); ?>" atr="security">账户安全</a></li>  
		<li><a href="<?= Url::to(['student/balance']); ?>" atr="balance">账户余额</a></li>   
	</ul>
<?php }elseif ($fun == 'balance') { ?>
	<a href="<?= Url::to(['student/index']); ?>" atr="index">
		<h1> 我的趣淘学  </h1>
	</a>
	<ul> 
		<li><a href="<?= Url::to(['student/goodsorder']); ?>" atr="goodsorder">我的订单</a></li>
		<li><a href="<?= Url::to(['student/partorder']); ?>" atr="partorder">我的兼职</a></li> 
		<li><a href="<?= Url::to(['student/comment']); ?>" atr="comment">商品评论</a></li>
		<li><a href="<?= Url::to(['student/partcomment']); ?>" atr="partcomment">兼职评论</a></li>
		<h2>个人设置</h2>
		<li><a href="<?= Url::to(['student/info']); ?>" atr="info">基本资料</a></li>       
		<li><a href="<?= Url::to(['student/security']); ?>" atr="security">账户安全</a></li>  
		<li><a class="co" href="<?= Url::to(['student/balance']); ?>" atr="balance">账户余额</a></li>   
	</ul>
<?php }else{ ?>
	<a href="<?= Url::to(['student/index']); ?>" atr="index">
		<h1> 我的趣淘学  </h1>
	</a>
	<ul> 
		<li><a href="<?= Url::to(['student/goodsorder']); ?>" atr="goodsorder">我的订单</a></li>
		<li><a href="<?= Url::to(['student/partorder']); ?>" atr="partorder">我的兼职</a></li> 
		<li><a href="<?= Url::to(['student/comment']); ?>" atr="comment">商品评论</a></li>
		<li><a href="<?= Url::to(['student/partcomment']); ?>" atr="partcomment">兼职评论</a></li>
		<h2>个人设置</h2>
		<li><a href="<?= Url::to(['student/info']); ?>" atr="info">基本资料</a></li>       
		<li><a href="<?= Url::to(['student/security']); ?>" atr="security">账户安全</a></li>  
		<li><a href="<?= Url::to(['student/balance']); ?>" atr="balance">账户余额</a></li>   
	</ul>
<?php } ?>
	
</div>