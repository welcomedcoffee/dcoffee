<?php
use yii\helpers\Html;
use yii\helpers\Url;
    $this->title = "我的门店";
?>
<link rel="stylesheet" href="/public/css/comm.css">
<link rel="stylesheet" href="/public/css/shop.css">
<link rel="stylesheet" href="/public/css/sty.css">
<script type="text/javascript" src="./public/js/ajaxupload.js"></script>
<style type="text/css">
span.add {
	margin-top: 22px;
	display: inline-block;
}

.input-file {
	position: relative; /* 保证子元素的定位 */
	width: 120px;
	height: 85px;
	background: #eee;
	border: 1px solid #ccc;
	text-align: center;
	cursor: pointer;
	top: -17px;
}

span {
	font-size: 12px;
}

.mar {
	margin-bottom: 2em;
}
</style>

<div class="t_min t_tit">
		当前位置：<a href="http://www.qutaoxue.net/">首页</a> &gt; 我的趣淘学
	</div>
	<!--我的趣淘学-->
	<div class="t_min">
		<div class="mt_ri_1">
			<div class="mt_rt" id="topmenus">
			<ul>
				<li class="img"> <img src="./public/images/us.jpg" width="100" height="100"></li>
				<li class="wi1">
					<h1>科科</h1>
					<p>手机号：18514429975</p></li>
				<li class="wi2">预收余额：1000.00</li>
				<li class="wi3">
					<a href="http://www.qutaoxue.net/merchant/merchantQuota">
						<span class="bg1">额度申请</span></a>
					<a href="http://www.qutaoxue.net/merchant/merchantParttimeList">
						<span class="bg2">兼职结算</span></a>
					<a href="http://www.qutaoxue.net/merchant/merchantParttimeList">
						<span class="bg3">兼职审核</span></a>
				</li>
			</ul>
			<div class="clear"></div>
			</div>
		</div>
		<div class="mt_le t_le" id="leftmenus">
		  <a href="http://www.qutaoxue.net/merchant/merchantIndex" atr="home"><h1>我的门店  </h1></a>
		  <ul>
		  	<li><a href="http://www.qutaoxue.net/merchant/merchantOrder" atr="order">我的订单</a></li>
		  	<li><a href="http://www.qutaoxue.net/merchant/merchantComment" atr="comment">我的评论</a></li>
		  	<h2>我的兼职</h2>
		  	<li><a href="http://www.qutaoxue.net/merchant/merchantPublish" atr="publish">发布兼职</a></li>
		  	<li><a href="http://www.qutaoxue.net/merchant/merchantParttimeList" atr="list">兼职列表</a></li>
		  	<h2>企业设置</h2>
		  	<li><a href="./public/images/趣淘学.html" atr="base" class="co">基本资料</a></li>
		  	<li><a href="http://www.qutaoxue.net/merchant/merchantSafe" atr="safe">账户安全</a></li>
		  	<li><a href="http://www.qutaoxue.net/merchant/merchantBalance" atr="account">账户余额</a></li>
		  </ul>
		</div>

		<div class="mt_ri t_ri">
			<div class="mt_rli">
				<div class="right">
					<div class="tittle">
						<span>企业信息</span> <span class="wenxinart">您好，修改资料任意资料都要重新审核，建议您不要频繁修改，以免给您带来不便。</span>
					</div>
					<form class="form">
						<p class="mar">
							企业名称： <input type="hidden" id="bid" value="170"> <input class="validate[required]" type="text" id="enterprisename" name="enterprisename" placeholder="请输入企业名称">
						</p>
						<p class="mar" style="text-indent: 1em">
							联系人：<input class="validate[required]" type="text" id="contactperson" name="contactperson" placeholder="请输入联系人">
						</p>
						<p class="mar">
							联系电话：<input class="validate[required]" type="text" id="contactpersonphone" name="contactpersonphone" placeholder="请输入联系电话">
						</p>
						<p class="mar" style="text-indent: 2em">
							职位： <input class="validate[required]" type="text" id="position" name="position" placeholder="请输入职位名称">
						</p>
						<p class="mar">
							企业地址： <select id="province" name="province"> <option value="-1">省</option><option value="110000" selected="selected">北京市</option><option value="120000">天津市</option><option value="130000">河北省</option><option value="140000">山西省</option><option value="150000">内蒙古自治区</option><option value="210000">辽宁省</option><option value="220000">吉林省</option><option value="230000">黑龙江省</option><option value="310000">上海市</option><option value="320000">江苏省</option><option value="330000">浙江省</option><option value="340000">安徽省</option><option value="350000">福建省</option><option value="360000">江西省</option><option value="370000">山东省</option><option value="410000">河南省</option><option value="420000">湖北省</option><option value="430000">湖南省</option><option value="440000">广东省</option><option value="450000">广西壮族自治区</option><option value="460000">海南省</option><option value="500000">重庆市</option><option value="510000">四川省</option><option value="520000">贵州省</option><option value="530000">云南省</option><option value="540000">西藏自治区</option><option value="610000">陕西省</option><option value="620000">甘肃省</option><option value="630000">青海省</option><option value="640000">宁夏回族自治区</option><option value="650000">新疆维吾尔自治区</option><option value="990000">新疆建设兵团</option></select> <input type="text" value="" id="oneCity" class="oneCity" code="" style="display: none"> <select id="city" name="city"> <option value="-1">请选择</option><option value="110001" selected="selected">北京市</option></select>
							<select id="area" name="area"><option value="110100">东城区</option><option value="110200">西城区</option><option value="110500">朝阳区</option><option value="110600">丰台区</option><option value="110700">石景山区</option><option value="110800" selected="selected">海淀区</option><option value="110900">门头沟区</option><option value="111100">房山区</option><option value="111200">通州区</option><option value="111300">顺义区</option><option value="111400">昌平区</option><option value="111500">大兴区</option><option value="111600">怀柔区</option><option value="111700">平谷区</option><option value="112800">密云县</option><option value="112900">延庆县</option></select>
						</p>
						<p class="mar">
							<input class="validate[required]" type="text" id="address" name="address" style="margin-left: 63px" placeholder="请输入企业地址">
						</p>
						<p class="mar">
							行业类型： <select name="industrytype" id="industrytype"> <option value="-1">请选择行业类型</option><option value="1">美食</option><option value="2">住宿</option><option value="3">娱乐</option><option value="4">生活</option><option value="5" selected="selected">其他</option></select> <select id="industChild" name="industChild" style="width: 130px;"><option value="64">旅游</option><option value="65">票务培训</option><option value="67">数码产品</option><option value="68">眼镜店</option><option value="70" selected="selected">其他</option></select>
						</p>
						<div>
							<div style="display: inline; position: relative; top: -50px">上传资质：</div>
							<div class="image" style="margin-top: 0;">
								<w> 企业LOGO</w>
								<div class="input-file">
									<img width="120" height="80" id="myselfpic1" class=" " src="./public/images/qiyelogo.png">
									<input type="hidden" name="mer_logo" value="1111">
								</div>
							</div>
							<div class="image">
								<w>营业执照</w>
								<div class="input-file">
									<img width="120" height="80" id="myselfpic2" class="" src="./public/images/zhizhao.png">
									<input type="hidden" name="mer_license" value="">
								</div>
							</div>
							<div class="image">
								<w>税务登记证</w>
								<div class="input-file">
									<img width="120" height="80" id="myselfpic3" class="" src="./public/images/shuiwu.png">
									<input type="hidden" name="mer_registration" value="">
								</div>
							</div>
							<div class="image">
								<w>组织机构代码证</w>
								<div class="input-file">
									<img width="120" height="80" id="myselfpic4" class="" src="./public/images/jigou.jpg">
									<input type="hidden" name="mer_ allow" value="">
								</div>

							</div>
							<p class="warm">只能上传jpg、jpeg、png类型的图片，大小不能超过2M</p>
							<div style="position: relative; left: -1em;">
								<div style="display: inline-block; position: relative; top: -50px;">上传身份证：</div>
								<div class="imageq" style="margin: 0; display: inline-block;">
									<w>身份证背面</w>
									<div class="input-file">
										<img src="./public/images/zhenmian.png" width="120" height="85" border="0" id="myselfpic6">
										<input type="hidden" name="mer_reverse" value="">
									</div>
								</div>
								<div class="imageq" style="display: inline-block;">
									<w>身份证正面</w>
									<div class="input-file">
										<img src="./public/images/fanmian.jpg" width="120" height="85" border="0" id="myselfpic5" class=" ">
										<input type="hidden" name="mer_positive" value="">
									</div>
								</div>
								<p class="warm1">只能上传jpg、jpeg、png类型的图片，大小不能超过2M</p>
							</div>
							<p class="mar">
								公司介绍：
								<textarea class="validate[required]" id="companyinfo" name="companyinfo" style="width: 336px; height: 100px;"></textarea>
								<span style="position: relative; left: -90px; top: 40px; color: #e5e5e4">最多输入500字</span>
							</p>
							<div>
								<div style="display: inline-block; position: relative; top: -50px">企业图片：</div>
								<div class="imagew" style="display: inline-block;">
									<w>企业图片</w>
									<div class="input-file">
										<img width="120" height="80" id="myselfpic7" class="" src="./public/images/logo.png">
										<input type="hidden" name="mer_image1" value="">
									</div>
								</div>
								<div class="imagew" style="display: inline-block;">
									<w>企业图片</w>
									<div class="input-file">
										<img width="120" height="80" id="myselfpic8" class=" " src="./public/images/logo.png">
										<input type="hidden" name="mer_image2" value="">
									</div>
								</div>
								<div class="imagew" style="display: inline-block;">
									<w>企业图片</w>
									<div class="input-file">
										<img width="120" height="80" id="myselfpic9" class=" " src="./public/images/logo.png">
										<input type="hidden" name="mer_image3" value="">
									</div>
								</div>
								<p class="warm">只能上传jpg、jpeg、png类型的图片，大小不能超过2M</p>
							</div>
							<p class="youhui">
								优惠设置：<input name="preferentialset" type="radio" value="0" class="radio" checked="checked" onclick="	GLOBAL.pagebase.btnfavorable(0);"> 无优惠 <input name="preferentialset" type="radio" value="1" class="radio" onclick="	GLOBAL.pagebase.btnfavorable(1);"> 满减 <input name="preferentialset" type="radio" value="2" class="radio" onclick="	GLOBAL.pagebase.btnfavorable(2);"> 折扣
							</p>
							<p>
							</p><div id="zhekou" style="display: none">
								<input type="text" style="width: 100px; height: 30px; margin-left: 60px;" name="discountamount" id="discountamount1">
								<y>%(可填1-100%兑付时按填写的折扣额度结算)</y>
							</div>
							<div id="manjian" style="display: none">
								每满
								<l style="color:red">100</l>
								减 <input type="text" style="width: 100px; height: 30px;" name="discountamount" id="discountamount2">
							</div>
							<p class="selectshow">
								是否前台展示：<input type="radio" class="radio" name="show" checked="checked" value="1">&nbsp;是&nbsp;
								<input type="radio" class="radio" name="show" value="0">&nbsp;否&nbsp;
							</p>
							<input type="button" value="修改" id="btnSave" style="width: 100px; height: 30px; background: #f39700; color: white; position: relative; left: 105px; margin-top: 3em; border: 0">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<div class="qpzz" style="display: none;">
   <div class="tip_box">
    <h3>温馨提示</h3>
    <img src="./public/images/cross27.png" style="width:25px;height:25px;float: right;position: relative;top:-35px;left:-5px;">
     <div class="con_t">
<p id="titleBox">资料提交成功，工作人员会在3个工作日内完成您的资料审核，审核通过后您才可以使用网站上的功能。</p>

     </div>
     <br><br>
     <div style="float: right; margin-right: 20px;">
     	<input type="button" name="" id="studetail" value="确定" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;">&nbsp;&nbsp;
     	<input type="button" name="" id="index" value="取消" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;">
     </div>
   </div>
</div>

<script>

	for (var i = 1; i <= $('.input-file').length; i++) {

		new AjaxUpload(a='#myselfpic'+i, {
                    // 提交目标
                    action: "<?php echo Url::to(['store/upload'])?>",
                    // 服务端接收的名称
                    name: "file",
                    // 自动提交
                    autoSubmit: true,
                    // 选择文件之后…
                    onChange: function (file, extension) {
                        if (new RegExp(/(jpg)|(jpeg)|(bmp)|(gif)|(png)/i).test(extension)) {
                            $("#filepath").val(file);
                        } else {
                            alert("只限上传图片文件，请重新选择！");
                        }
                    },
                    // 开始上传文件
                    onSubmit: function (file, extension) {

                    },

                    // 上传完成之后
                    onComplete: function (file, response) {
                        /*if (response == "Success") $("#state").val("上传完成！");
                        else $("#state").val(response);*/
                        console.log(this);
                        this._button.src = response;

                        $("#"+this._button.id).next("input").val(response);

                    }

                });

	}

</script>
