<?php
use yii\helpers\Url;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/images/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/skin/default/skin.css" rel="stylesheet" type="text/css" id="skin" />
<link href="/lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>咖啡豆金融管理后台</title>
</head>
<body>
<header class="Hui-header cl"> <a class="Hui-logo l" href="/">H-ui.admin</a> <a class="Hui-logo-m l" href="/" title="H-ui.admin">咖啡豆金融管理后台</a> <span class="Hui-subtitle l">V1.0</span>
	<nav class="mainnav cl" id="Hui-nav">
	</nav>
	<ul class="Hui-userbar">
		<li>超级管理员</li>
		<li class="dropDown dropDown_hover"><a href="#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
			<ul class="dropDown-menu radius box-shadow">
				<li><a href="<?= Url::to(['center/index']) ?>">个人信息</a></li>
				<li><a href="<?= Url::to(['center/index']) ?>">切换账户</a></li>
				<li><a href="<?= Url::to(['public/login']) ?>">退出</a></li>
			</ul>
		</li>
		<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
		<li id="Hui-skin" class="dropDown right dropDown_hover"><a href="javascript:;" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
			<ul class="dropDown-menu radius box-shadow">
				<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
				<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
				<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
				<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
				<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
				<li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
			</ul>
		</li>
	</ul>
	<a aria-hidden="false" class="Hui-nav-toggle" href="#"></a> </header>
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?= Url::to(['user/enterprise']) ?>" href="javascript:void(0)">企业用户</a></li>
					<li><a _href="<?= Url::to(['user/student']) ?>" href="javascript:void(0)">学生用户</a></li>
					<li><a _href="<?= Url::to(['user/admin']) ?>" href="javascript:void(0)">管理员用户</a></li>
					<li><a _href="<?= Url::to(['user/role']) ?>" href="javascript:void(0)">角色列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 数据统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?= Url::to(['data/common']) ?>" href="javascript:void(0)">公共数据统计</a></li>
					<li><a _href="<?= Url::to(['data/stu']) ?>" href="javascript:void(0)">学生数据统计</a></li>
					<li><a _href="<?= Url::to(['data/mer']) ?>" href="javascript:void(0)">商家数据统计</a></li>
				</ul>
			</dd>
		</dl>
		
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 商家审核管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?= Url::to(['meraudit/info']) ?>" href="javascript:void(0)">基本信息审核</a></li>
					<li><a _href="<?= Url::to(['meraudit/part']) ?>" href="javascript:void(0)">发布兼职审核</a></li>
					<li><a _href="<?= Url::to(['meraudit/type']) ?>" href="javascript:void(0)">商家类型申请</a></li>
					<li><a _href="<?= Url::to(['meraudit/refund']) ?>" href="javascript:void(0)">商家退款信息</a></li>
					<li><a _href="<?= Url::to(['meraudit/quota']) ?>" href="javascript:void(0)">申请限额审核</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 学生审核管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?= Url::to(['studentaudit/info']) ?>" href="javascript:void(0)">信息审核</a></li>
					<li><a _href="<?= Url::to(['studentaudit/quota']) ?>" href="javascript:void(0)">申请限额审核</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i> 账户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?= Url::to(['account/income']) ?>" href="javascript:;">用户交易数据</a></li>
					<li><a _href="<?= Url::to(['account/repayment']) ?>" href="javascript:void(0)">用户交易信息</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?= Url::to(['system/info']) ?>" href="javascript:void(0)">系统设置</a></li>
					<li><a _href="<?= Url::to(['system/log']) ?>" href="javascript:void(0)">系统日志</a></li>
				</ul>
			</dd>
		</dl>
	</div>
</aside>
<div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="我的桌面" data-href="<?= Url::to(['site/welcome']) ?>">我的桌面</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?= Url::to(['site/welcome']) ?>"></iframe>
		</div>
	</div>
</section>
<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/lib/layer/1.9.3/layer.js"></script> 
<script type="text/javascript" src="/js/H-ui.js"></script> 
<script type="text/javascript" src="/js/H-ui.admin.js"></script> 
<script type="text/javascript">
/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
</script> 

</body>
</html>