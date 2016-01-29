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
				<li class="img"> <img src="/public/images/us.jpg" width="100" height="100"></li>
				<li class="wi1">
					<h1><?= Html::encode($model->mer_name) ?></h1>
					<p>手机号：<?= Html::encode($model->mer_phone) ?></p></li>
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
					<div class="tittle">
						<span>企业信息</span> <span class="wenxinart" style="color:red">您好，修改资料任意资料都要重新审核，建议您不要频繁修改，以免给您带来不便。</span>
					</div>
					<!-- <form class="form" method="post" action="<?php echo Url::to(['store/update'])?>"> -->
					<?php
                $form = ActiveForm::begin([
                    'options' => ['id'=>'site-form','enctype' => 'multipart/form-data','class' => "form"],
                    'action'=>Url::to(['store/update']),
                    'method'=>'post',
                    'fieldConfig' => [
                        'template' => '<p class="mar">{label}{input}{error}</p>'
                    ],
                ]);
                ?>

							<!-- <input class="validate[required]" type="text" id="enterprisename" name="enterprisename" placeholder="请输入企业名称"> -->
							<?= $form->field($model, 'mer_name', ['inputOptions'=>['placeholder'=>'请输入企业名称']])->textInput(['id'=>"enterprisename",'class'=>"validate[required]",'required'=>"required"]) ?>

							<?= $form->field($model, 'mer_contact',['inputOptions'=>['placeholder'=>'请输入联系人'],'template'=>'<p class="mar" style="text-indent: 1em">{label}{input}{error}</p>'])->textInput(['id'=>'contactperson','required'=>"required"]) ?>
						<!-- <p class="mar" style="text-indent: 1em">
							联系人：<input class="validate[required]" type="text" id="contactperson" name="contactperson" placeholder="请输入联系人">
						</p> -->
						<!-- <p class="mar">
							联系电话：<input class="validate[required]" type="text" id="contactpersonphone" name="contactpersonphone" placeholder="请输入联系电话">
						</p> -->
						<?= $form->field($model, 'mer_conphone', ['inputOptions'=>['placeholder'=>'请输入联系电话']])->textInput(['id'=>"contactpersonphone",'class'=>"validate[required]",'required'=>"required"]) ?>

						<?= $form->field($model, 'mer_position',['inputOptions'=>['placeholder'=>'请输入联系人'],'template'=>'<p class="mar" style="text-indent: 2em">{label}{input}{error}</p>'])->textInput(['id'=>'position','required'=>"required"]) ?>
						<!-- <p class="mar" style="text-indent: 2em">
							职位： <input class="validate[required]" type="text" id="position" name="position" placeholder="请输入职位名称">
						</p> -->
						<p class="mar">
							企业地址：
									<!-- 选择省 -->
									<select id="province" name="mer_province">
						 				<option value="-1">请选择</option>
						 				<?php foreach($province as $k=>$v){
						  				if ($v['region_id'] == $model->mer_province) {
						  						echo '<option selected class="province" value="'.$v['region_id'].'">'.$v['region_name'].'</option>';
						  				}else{
						  						echo '<option  class="province" value="'.$v['region_id'].'">'.$v['region_name'].'</option>';
						  				}
	    							} ?>

						 			</select>
						 			<input type="text" value="" id="oneCity" class="oneCity" code="" style="display: none">
						 			<!-- 市 -->
						 			<select id="city" name="mer_city">
						 				<option value="-1">请选择</option>
						 				<?php foreach($citys as $k=>$v){
						  				if ($v['region_id'] == $model->mer_city) {
						  						echo '<option selected class="citys" value="'.$v['region_id'].'">'.$v['region_name'].'</option>';
						  				}else{
						  						echo '<option  class="citys" value="'.$v['region_id'].'">'.$v['region_name'].'</option>';
						  				}
	    							} ?>

						 			</select>

						  		<select id="area" name="mer_area">
						  			<option value="-1">请选择</option>
						  			<?php foreach($areas as $k=>$v){
						  				if ($v['region_id'] == $model->mer_area) {
						  						echo '<option selected class="areas" value="'.$v['region_id'].'">'.$v['region_name'].'</option>';
						  				}else{
						  						echo '<option  class="areas" value="'.$v['region_id'].'">'.$v['region_name'].'</option>';
						  				}
	    							} ?>
						  		</select>
						</p>

							<!-- <input class="validate[required]" required="required" type="text" id="address" name="mer_address" style="margin-left: 63px" placeholder="请输入企业地址"> -->
						<?= $form->field($model, 'mer_address',['inputOptions'=>['placeholder'=>'请输入企业地址'],'template'=>'<p class="mar">{input}{error}</p>'])->textInput(['id'=>'position','required'=>"required",'style'=>"margin-left: 63px"]) ?>

						<p class="mar">
							行业类型：
									<select name="ind_type" id="industrytype">
										<option value="-1">请选择行业类型</option>
										<?php foreach ($type as $k => $v) {
											if ($v['type_id']==$model->ind_type) {
												echo "<option selected value=".$v['type_id'].">".$v['type_name']."</option>";
											}else{
												echo "<option value=".$v['type_id'].">".$v['type_name']."</option>";
											}

										} ?>
									</select>
									<select id="industChild" name="ind_type_child" style="width: 130px;">
										<option value="-1">请选择子行业类型</option>
										<?php foreach ($childtype as $k => $v) {
											if ($v['type_id']==$model->ind_type_child) {
											echo "<option selected value=".$v['type_id'].">".$v['type_name']."</option>";
										}else{
											echo "<option  value=".$v['type_id'].">".$v['type_name']."</option>";
											}} ?>
									</select>
						</p>
						<div>
							<div style="display: inline; position: relative; top: -50px">上传资质：</div>
							<div class="image" style="margin-top: 0;">
								<w> 企业LOGO</w>
								<div class="input-file">
								<?php
											if ($model->mer_logo) {
										 		echo '<img width="120" height="80" id="myselfpic1" src="'.$model->mer_logo.'">
													<input type="hidden" name="mer_logo" value="'.$model->mer_logo.'">';
										 	}else{
										 		echo '<img src="/public/images/qiyelogo.png" width="120" height="80"  id="myselfpic1">
													<input type="hidden" name="mer_logo" value="">';
										 	}
										?>

								</div>
							</div>
							<div class="image">
								<w>营业执照</w>
								<div class="input-file">
								<?php
											if ($model->mer_license) {
										 		echo '<img width="120" height="80" id="myselfpic2" src="'.$model->mer_license.'">
													<input type="hidden" name="mer_license" value="'.$model->mer_license.'">';
										 	}else{
										 		echo '<img src="/public/images/zhizhao.png" width="120" height="80"  id="myselfpic2">
													<input type="hidden" name="mer_license" value="">';
										 	}
										?>

								</div>
							</div>
							<div class="image">
								<w>税务登记证</w>
								<div class="input-file">
								<?php
											if ($model->mer_registration) {
										 		echo '<img width="120" height="80" id="myselfpic3" src="'.$model->mer_registration.'">
													<input type="hidden" name="mer_registration" value="'.$model->mer_registration.'">';
										 	}else{
										 		echo '<img src="/public/images/shuiwu.png" width="120" height="80"  id="myselfpic3">
													<input type="hidden" name="mer_registration" value="">';
										 	}
										?>


 						</div>
							</div>
							<div class="image">
								<w>组织机构代码证</w>
								<div class="input-file">
								<?php
											if ($model->mer_allow) {
										 		echo '<img width="120" height="80" id="myselfpic4" border="0" src="'.$model->mer_allow.'">
													<input type="hidden" name="mer_allow" value="'.$model->mer_allow.'">';
										 	}else{
										 		echo '<img src="/public/images/jigou.jpg" width="120" height="85" border="0" id="myselfpic4">
													<input type="hidden" name="mer_allow" value="">';
										 	}
										?>

								</div>

							</div>
							<p class="warm">只能上传jpg、jpeg、png类型的图片，大小不能超过2M</p>
							<div style="position: relative; left: -1em;">
								<div style="display: inline-block; position: relative; top: -50px;">上传身份证：</div>
								<div class="imageq" style="margin: 0; display: inline-block;">
									<w>身份证背面</w>
									<div class="input-file">
									<?php
											if ($model->mer_reverse) {
										 		echo '<img width="120" height="85" id="myselfpic6" border="0" src="'.$model->mer_reverse.'">
													<input type="hidden" name="mer_reverse" value="'.$model->mer_reverse.'">';
										 	}else{
										 		echo '<img src="/public/images/zhenmian.png" width="120" height="85" border="0" id="myselfpic6">
													<input type="hidden" name="mer_reverse" value="">';
										 	}
										?>

									</div>
								</div>
								<div class="imageq" style="display: inline-block;">
									<w>身份证正面</w>
									<div class="input-file">
									<?php
											if ($model->mer_positive) {
										 		echo '<img width="120" height="85" id="myselfpic5" border="0" src="'.$model->mer_positive.'">
													<input type="hidden" name="mer_positive" value="'.$model->mer_positive.'">';
										 	}else{
										 		echo '<img src="/public/images/fanmian.jpg" width="120" height="85" border="0" id="myselfpic5" class=" ">
													<input type="hidden" name="mer_positive" value="">';
										 	}
										?>

									</div>
								</div>
								<p class="warm1">只能上传jpg、jpeg、png类型的图片，大小不能超过2M</p>
							</div>
							<p class="mar">
								公司介绍：
								<textarea class="validate[required]" id="companyinfo" name="mer_introduce" style="width: 336px; height: 100px;"><?= $model->mer_introduce ?></textarea>
								<span style="position: relative; left: -90px; top: 40px; color: #e5e5e4">最多输入500字</span>
							</p>
							<div>
								<div style="display: inline-block; position: relative; top: -50px">企业图片：</div>
								<div class="imagew" style="display: inline-block;">
									<w>企业图片</w>
									<div class="input-file">
										<?php
											if ($model->mer_image1) {
										 		echo '<img width="120" height="80" id="myselfpic7" class="" src="'.$model->mer_image1.'">
													<input type="hidden" name="mer_image1" value="'.$model->mer_image1.'">';
										 	}else{
										 		echo '<img width="120" height="80" id="myselfpic7" class="" src="/public/images/logo.png">
													<input type="hidden" name="mer_image1" value="">';
										 	}
										?>

									</div>
								</div>
								<div class="imagew" style="display: inline-block;">
									<w>企业图片</w>
									<div class="input-file">
										<?php
											if ($model->mer_image2) {
										 		echo '<img width="120" height="80" id="myselfpic8" class=" " src="'.$model->mer_image1.'">
													<input type="hidden" name="mer_image2" value="'.$model->mer_image1.'">';
										 	}else{
										 		echo '<img width="120" height="80" id="myselfpic8" class=" " src="/public/images/logo.png">
													<input type="hidden" name="mer_image2" value="">';
										 	}
										?>

									</div>
								</div>
								<div class="imagew" style="display: inline-block;">
									<w>企业图片</w>
									<div class="input-file">
									<?php
											if ($model->mer_image3) {
										 		echo '<img width="120" height="80" id="myselfpic9" class=" " src="'.$model->mer_image1.'">
													<input type="hidden" name="mer_image3" value="'.$model->mer_image1.'">';
										 	}else{
										 		echo '<img width="120" height="80" id="myselfpic9" class=" " src="/public/images/logo.png">
													<input type="hidden" name="mer_image3" value="">';
										 	}
										?>

									</div>
								</div>
								<p class="warm">只能上传jpg、jpeg、png类型的图片，大小不能超过2M</p>
							</div>

							 <input type="submit" value="修改" id="btnSave" style="width: 100px; height: 30px; background: #f39700; color: white; position: relative; left: 105px; margin-top: 3em; border: 0">

						</div>
					<!-- </form> -->
					<?php ActiveForm::end();?>
				</div>
			</div>
		</div>
	</div>
<div class="qpzz" style="display:<?php if ($is_update==1) {
	echo '';
}else{echo 'none';} ?>;">
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
