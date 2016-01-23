<?php
use yii\helpers\Url;
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,member-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link href="css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>学生审核管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 学生审核管理 <span class="c-gray en">&gt;</span> 申请限额审核 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>

	<div class="mt-20">
    <span class="r" style="padding-left: 50px;">共有数据：<strong>88</strong> 条</span>
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">用户名</th>
				<th width="40">性别</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th width="">地址</th>
				<th width="130">加入时间</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>1</td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','<?= Url::to(['user/show']) ?>','10001','360','400')">张三</u></td>
				<td>男</td>
				<td>13000000000</td>
				<td>admin@mail.com</td>
				<td class="text-l">北京市 海淀区</td>
				<td>2014-6-11 11:11:42</td>
				<td class="td-status"><span class="label radius">未审核</span></td>

				<td class="td-manage">


                <a style="text-decoration:none" onClick="member_unaccess(this,'10001')" href="javascript:;" title="审核不通过"><i class="Hui-iconfont">&#xe6e0;</i></a> 

                <a style="text-decoration:none" onClick="member_access(this,'10001')" href="javascript:;" title="审核通过"><i class="Hui-iconfont">&#xe6e1;</i></a> 
                
                <a style="text-decoration:none" class="ml-5" onClick="repay_log('查看还款记录','<?= Url::to(['studentaudit/repay-log']) ?>','10001','600','270')" href="javascript:;" title="查看还款记录"><i class="Hui-iconfont">&#xe695;</i></a>

                <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe609;</i></a>
                

                </td>
			</tr>

            <tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>1</td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','<?= Url::to(['user/show']) ?>','10001','360','400')">张三</u></td>
				<td>男</td>
				<td>13000000000</td>
				<td>admin@mail.com</td>
				<td class="text-l">北京市 海淀区</td>
				<td>2014-6-11 11:11:42</td>
				<td class="td-status"><span class="label label-error radius">审核未通过</span></td>

				<td class="td-manage">
                
                <a style="text-decoration:none" onClick="member_unaccess(this,'10001')" href="javascript:;" title="审核不通过"><i class="Hui-iconfont">&#xe6e0;</i></a> 

                <a style="text-decoration:none" onClick="member_access(this,'10001')" href="javascript:;" title="审核通过"><i class="Hui-iconfont">&#xe6e1;</i></a> 
                
                 <a style="text-decoration:none" class="ml-5" onClick="repay_log('查看还款记录','<?= Url::to(['studentaudit/repay-log']) ?>','10001','600','270')" href="javascript:;" title="查看还款记录"><i class="Hui-iconfont">&#xe695;</i></a>

                <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe609;</i></a>

                </td>
			</tr>

            <tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>1</td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','<?= Url::to(['user/show']) ?>','10001','360','400')">张三</u></td>
				<td>男</td>
				<td>13000000000</td>
				<td>admin@mail.com</td>
				<td class="text-l">北京市 海淀区</td>
				<td>2014-6-11 11:11:42</td>
				<td class="td-status"><span class="label label-success radius">审核成功</span></td>

				<td class="td-manage">
                
                <a style="text-decoration:none" onClick="member_unaccess(this,'10001')" href="javascript:;" title="审核不通过"><i class="Hui-iconfont">&#xe6e0;</i></a> 

                <a style="text-decoration:none" onClick="member_access(this,'10001')" href="javascript:;" title="审核通过"><i class="Hui-iconfont">&#xe6e1;</i></a> 
                
                <a style="text-decoration:none" class="ml-5" onClick="repay_log('查看还款记录','<?= Url::to(['studentaudit/repay-log']) ?>','10001','600','270')" href="javascript:;" title="查看还款记录"><i class="Hui-iconfont">&#xe695;</i></a> 

                <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe609;</i></a>
                </td>
			</tr>

            
		</tbody>
	</table>
	</div>
</div>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="js/H-ui.js"></script> 
<script type="text/javascript" src="js/H-ui.admin.js"></script> 
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});
	
});

/*用户-审核不通过*/
function member_unaccess(obj,id){
	layer.confirm('确认要不通过审核吗？',function(index){

        
		$(obj).parents("tr").find(".td-status").html('<span class="label label-error radius">审核不通过</span>');

		layer.msg('审核不通过!',{icon: 5,time:1000});
	});
}

/*用户-审核通过*/
function member_access(obj,id){
	layer.confirm('确认要通过审核吗？',function(index){

		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">审核通过</span>');

		layer.msg('审核通过!',{icon: 6,time:1000});
	});
}
/*查看用户还款信息*/
function repay_log(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
</script> 
</body>
</html>