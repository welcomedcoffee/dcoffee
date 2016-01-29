<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;

  $this->title = "我的门店";
?>
<link rel="stylesheet" href="/public/css/comm.css">
<link rel="stylesheet" href="/public/css/shop.css">
<link rel="stylesheet" href="/public/css/sty.css">
<script type="text/javascript" src="/public/js/ajaxupload.js"></script>


<div class="t_min t_tit">
		当前位置：<a href="http://www.qutaoxue.net/">首页</a> &gt; 我的趣淘学
	</div>
	<!--我的趣淘学-->
	<div class="t_min">
		<div class="mt_ri_1">
			<div class="mt_rt" id="topmenus">
			<ul>
				<li class="img"> <img src="/public/images/us.jpg" width="100" height="100"></li>
				<li class="wi1">
					<h1>科科</h1>
					<p>手机号：18514429975</p></li>
				<li class="wi2">预收余额：1000.00</li>
				<li class="wi3">
					<a href="<?php echo Url::to(['store/apply-limit'])  ?>">
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
		  <a href="<?= Url::to(['mystore/part'])?>" atr="home"><h1>我的门店  </h1></a>
		  <ul>
		  	<li><a href="http://www.qutaoxue.net/merchant/merchantOrder" atr="order">我的订单</a></li>
		  	<li><a href="http://www.qutaoxue.net/merchant/merchantComment" atr="comment">我的评论</a></li>
		  	<h2>我的兼职</h2>
		  	<li><a href="<?= Url::to(['mystore/part'])?>" atr="publish">发布兼职</a></li>
		  	<li><a href="<?= Url::to(['mystore/partlist'])?>" atr="list">兼职列表</a></li>
		  	<h2>企业设置</h2>
		  	<li><a href="<?= Url::to(['store/index'])?>" atr="base" class="co">基本资料</a></li>
		  	<li><a href="#" atr="safe">账户安全</a></li>
		  	<li><a href="http://www.qutaoxue.net/merchant/merchantBalance" atr="account">账户余额</a></li>
		  </ul>
		</div>

		<div class="mt_ri t_ri">
			<div class="mt_rli">
				<div class="right">
					<div class="mt_rli">
          <div class="tittle">
            <span>限额申请</span> <span class="wenxinart" style="color:red">您好，修改资料任意资料都要重新审核，建议您不要频繁修改，以免给您带来不便。</span>
          </div>
                <!-- <h3 style="border-bottom: solid 1px; padding: 0; margin: 0; font-family: 微软雅黑; height: 40px; line-height: 40px">&nbsp;&nbsp;&nbsp;限额申请</h3><span>企业信息</span> <span class="wenxinart" style="color:red">您好，修改资料任意资料都要重新审核，建议您不要频繁修改，以免给您带来不便。</span>
                 -->

                <div id="register" style="padding-top: 10px;">
                    <span style="font-size: 12px;">
                        预收余额&nbsp;:&nbsp; <span style="color: #da1f29; font-size: 12px;" id="advancelimit">0.00</span> <span style="font-size: 12px;">元</span>
                    </span>&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 12px;">
                        预收限额&nbsp;:&nbsp; <span style="color: #da1f29; font-size: 12px;" id="astrictlimit">0.00</span> <span style="font-size: 12px;">元</span>
                    </span><br>
                    <br>
                            <?php
                $form = ActiveForm::begin([
                    'options' => ['id'=>'site-form','enctype' => 'multipart/form-data','class' => "frm"],
                    'action'=>Url::to(['store/apply-limit']),
                    'method'=>'post',

                ]);
                ?>
                    <br>
                    <?= $form->field($model, 'apply_limit', ['inputOptions'=>['placeholder'=>''],'template'=>'<span style="font-size: 12px;">预收额申请&nbsp;:
                    {input}{error}</span>&nbsp;<span style="color: #9f9fa0; font-size: 12px;">最高申请额度：</span><span style="color: #da1f29; font-size: 12px;" id="moneyTEXT">1000</span><span style="font-size: 12px; color: #9f9fa0;">元</span> '])->textInput(['id'=>"apply_limit",'name'=>"apply_limit"]) ?>
                    <!-- <span style="font-size: 12px;">预收额申请&nbsp;:
                    <input type="text" id="apply_limit" name="apply_limit"></span>&nbsp;
                    <span style="color: #9f9fa0; font-size: 12px;">最高申请额度：</span>  <span style="color: #da1f29; font-size: 12px;" id="moneyTEXT">1000</span>
                    <span style="font-size: 12px; color: #9f9fa0;">元</span> <br>
                    <br>-->
                    <br>
					          <?= $form->field($model, 'apply_reason', ['inputOptions'=>['placeholder'=>''],'template'=>'<span style="font-size: 12px;">申请理由&nbsp;:
                        {input}{error}</span>'])->textInput(['id'=>"apply_reason",'name'=>"apply_reason"]) ?>
                    <!-- <span style="font-size: 12px;">
                         申请理由&nbsp;:
                         <input type="text" id="apply_reason" name="apply_reason" value="">
                     </span> --> <br>
                    <br>
                    <br>
                    <?= Html::submitButton('提交申请', ['class'=>'btn btn-primary','name' =>'submit-button','style'=>"width: 100px; height: 30px; background: #f39700; color: white; margin-left: 9%",'id'=>'btnApplay']) ?>
                    <!-- <input type="button" id="btnApplay" value="提交申请" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 9%;"> -->&nbsp;&nbsp;&nbsp;
                    <span style="color: #f39700; font-size: 12px;">
                </span>
                <?php ActiveForm::end();?>
                </div>
            </div>
			</div>
		</div>
	</div>
<div class="qpzz" style="display:none">
   <div class="tip_box">
    <h3>温馨提示</h3>
    <img src="/public/images/cross27.png" style="width:25px;height:25px;float: right;position: relative;top:-35px;left:-5px;">
     <div class="con_t">
<p id="titleBox">资料提交成功，工作人员会在3个工作日内完成您的资料审核，审核通过后您才可以使用网站上的功能。</p>

     </div>
     <br><br>
     <div style="float: right; margin-right: 20px;">
     	<input type="button" name="" id="studetail" value="确定" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;">&nbsp;&nbsp;

     </div>
   </div>
</div>

<script>
	//创建input上传标签
	//上传图片
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

	//加载市列表
  	$("#province").change(function() {
  		 var region_id = $(this).val();
  		 var type = "city"
  		 if (region_id != '-1') {
  		 		$.ajax({
  		 			url: "<?= Url::to(['store/region']) ?>",
  		 			type: "GET",
  		 			dataType: 'html',
  		 			data: "region_id="+region_id+"&type="+type,
  		 			success: function(msg){
		                $("#city>option:gt(0)").remove();
		                $("#area>option:gt(0)").remove();
		                $("#city").append(msg)
		            }
		  		})
  		 }else{
  		 	$("#city>option:gt(0)").remove();
  		 	$("#area>option:gt(0)").remove();
  		 }
  });

  	//加载区列表
    $("#city").change(function() {
  		 var region_id = $(this).val();
  		 var type = "area"
  		 if (region_id != '-1') {
  		 		$.ajax({
  		 			url: "<?= Url::to(['store/region']) ?>",
  		 			type: "GET",
  		 			dataType: 'html',
  		 			data: "region_id="+region_id+"&type="+type,

  		 			success: function(msg){
                $("#area>option:gt(0)").remove();
                $("#area").append(msg);
            }
  		 		})
  		 }
  });
    //加载子行业信息
    $("#industrytype").change(function() {
  		 var type_id = $(this).val();

  		 if (type_id != '-1') {
  		 		$.ajax({
  		 			url: "<?= Url::to(['store/mertype']) ?>",
  		 			type: "GET",
  		 			dataType: 'html',
  		 			data: "type_id="+type_id,

  		 			success: function(msg){
                		$("#industChild>option:gt(0)").remove();
                		$("#industChild").append(msg)
            		}
  		 		})
  		 }else{
  		 	$("#industChild>option:gt(0)").remove();
  		 }
  });

    $('#studetail').click(function() {
    		$('.qpzz').hide('slow/400/fast');
    });

    $('#btnSave').click(function() {
    	if (confirm("修改信息后需要重新审核！您确定要修改吗?")) {
    		return true
    	}else{
    		return false
    	}

    });

</script>
