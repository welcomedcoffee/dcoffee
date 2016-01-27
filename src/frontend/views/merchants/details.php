<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\Helper;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
$this->title = '优质商家';
?>
<link rel="stylesheet" type="text/css" href="/public/css/jquery.css" />
<link rel="stylesheet" type="text/css" href="/public/css/pagecss.css" />
<link rel="stylesheet" href="/public/css/ShopShow.css" type="text/css" />
<link rel="stylesheet" href="/public/css/MagicZoom.css" type="text/css" />
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ZT4wsbKvt0nB8pvbGAREQisb"></script>
<style type="text/css">
	.ys{background:#FF8400;}
	.moy{color:#FF8400;}
	#l-map{height:300px;width:100%;}
    #r-result{width:100%;}
    .btnContent{
					margin:50px 0 120px 0;
				}
	.btnContent ul li{
		border:1px solid #DDDDDD;
		width:200px;
		height:45px;
		text-align:center;
		line-height:45px;
		font-size:18px;
		font-family:bold;
		color:#000000;
		border-radius:4px;
		float:left;
	}
</style>

<!-- body -->

<div class="wrap">
    <div class="container">

    <div class="t_min t_tit">
        当前位置：
        <a href="<?= Url::to(['site/index'])?>">首页</a>
        &gt;
        <a href="<?= Url::to(['merchants/index'])?>">优质商家</a>
        &gt;
        <a href="javascript:void(0)" id="bussiname"><?= Html::encode($mer_details['mer_name'])?></a>
    </div>
    <div class="t_min">
        <div class="t_sdat" id="buinessContentDemo">
            <!--商家 详情-->
            <div style="float:left">
               
                <div id="tsShopContainer">
	<div id="tsImgS">
	<a href="<?= Html::encode($mer_details['mer_logo'])?>" title="Images" class="MagicZoom" id="MagicZoom"><img width="300" height="300" src="<?= Html::encode($mer_details['mer_logo'])?>" /></a></div>
	<div id="tsPicContainer">
		<div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
		<div id="tsImgSCon">
			<ul>
				<li onclick="showPic(0)" rel="MagicZoom" class="tsSelectImg"><img height="42" width="42" src="<?= Html::encode($mer_details['mer_logo'])?>" tsImgS="<?= Html::encode($mer_details['mer_logo'])?>" /></li>

				<li onclick="showPic(1)" rel="MagicZoom"><img height="42" width="42" src="<?= Html::encode($mer_details['mer_image1'])?>" tsImgS="<?= Html::encode($mer_details['mer_image1'])?>" /></li>
				<li onclick="showPic(2)" rel="MagicZoom"><img height="42" width="42" src="<?= Html::encode($mer_details['mer_image2'])?>" tsImgS="<?= Html::encode($mer_details['mer_image2'])?>" /></li>
				<li onclick="showPic(3)" rel="MagicZoom"><img height="42" width="42" src="<?= Html::encode($mer_details['mer_image3'])?>" tsImgS="<?= Html::encode($mer_details['mer_image3'])?>" /></li>
				
			</ul>
		</div>
		<div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
	</div>
	<img class="MagicZoomLoading" width="16" height="16" src="/public/images/loading.gif" alt="Loading..." />
</div>
            </div>

                <div class="t_le t_sdtext" style="margin-left:70px">
                    <h1><?= Html::encode($mer_details['mer_name'])?></h1>
			<p>
            <?php if ($mer_details['mer_level']=='1') {?>
                <span class="ys"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span>
            <?php }elseif ($mer_details['mer_level']=='2') {?>
                <span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span>
            <?php }elseif ($mer_details['mer_level']=='3') {?>
                <span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span>
            <?php }elseif ($mer_details['mer_level']=='4') {?>
                <span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="bg"><em ></em></span>
            <?php }else{?>
                <span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span>
            <?php }?>	 
	                </p>
										<div class="clear"></div>
                    <p>人均消费：<strong class="moy"x>￥<?= Html::encode($mer_details['mer_capita'])?></strong></p>
                    <p>营业时间：<?= Html::encode($mer_details['mer_start'])?>-<?= Html::encode($mer_details['mer_end'])?></p>
                    <p>商家地址：<?= Html::encode($mer_details['mer_address'])?></p>
                    <p>预约电话：<?= Html::encode($mer_details['mer_phone'])?></p>
                    <div class="t_sdtextbt">
                        <a href="<?= Url::to(['merchants/pay'])?>" id="btnConvert">淘学金兑换<span style=" width: 0px; height: 0px;" id="transmark"></span></a>
                    </div>
                </div>
                <div class="clear"></div>
					<div class="btnContent">
						<ul>
						<li class="active">商家位置</li>
						<li>商家介绍</li>
						<li>用户评论</li>
						</ul>
					</div>
				<div class="clear"></div>
				<!--商家位置-->
				<div>
					<h1>
						<strong style="font-size:18px;"><span style="margin:0 0 0 20px"><img src="public/images/iconfont-dizhi.png" alt="" height="25px" width="25px"></span>&nbsp;&nbsp;商家位置</strong>
						 <hr>
						<div class="clear"></div>
					</h1>
					<div class="t_sdtext" style="margin:25px 0 0 30px;">
						<div id="mapAdress" style="float:left;width:450px">
			                <div id="l-map"></div>
			            </div>
						<div class="t_le t_sdtext" style="margin-left:70px">
                    <h1><?= Html::encode($mer_details['mer_name'])?></h1>
                	
                	<p>
            <?php if ($mer_details['mer_level']=='1') {?>
                <span class="ys"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span>
            <?php }elseif ($mer_details['mer_level']=='2') {?>
                <span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span>
            <?php }elseif ($mer_details['mer_level']=='3') {?>
                <span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="bg"><em ></em></span><span class="bg"><em ></em></span>
            <?php }elseif ($mer_details['mer_level']=='4') {?>
                <span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="bg"><em ></em></span>
            <?php }else{?>
                <span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span><span class="ys"><em ></em></span>
            <?php }?>	 
	                </p>
            	 
                    <div class="clear"></div>
                    <p>人均消费：<strong class="moy"x>￥<?= Html::encode($mer_details['mer_capita'])?></strong></p>
                    <p>营业时间：<?= Html::encode($mer_details['mer_start'])?>-<?= Html::encode($mer_details['mer_end'])?></p>
                    <p class="addresss" name="<?= Html::encode($mer_details['mer_address'])?>">
                    商家地址：<?= Html::encode($mer_details['mer_address'])?></p>
                    <p>预约电话：<?= Html::encode($mer_details['mer_phone'])?></p>
                </div>
					</div>
				</div>
				<br>
                <!--商家介绍-->
                <div style="clear:both;padding-top: 40px;">
                    <h1>
                       <strong style="font-size:18px;"><span style="margin:0 0 0 20px"><img src="public/images/u45.png" alt="" height="25px" width="25px"></span>&nbsp;&nbsp;商家介绍</strong>
						<hr>
                        <div class="clear"></div>
                    </h1>
                    <div class="t_sdjji" style="margin:0 0 0 30px;font-size:16px">
                    <?= Html::encode($mer_details['mer_introduce'])?></div>
                </div>
				<br>
            <!--订单评论-->
        <div class="" style="padding-top:40px">
            <h1>
                 <strong style="font-size:18px;"><span style="margin:0 0 0 20px"><img src="public/images/u50.png" alt="" height="25px" width="25px"></span>&nbsp;&nbsp;订单评论</strong>
				<hr>
                <div class="clear"></div>
            </h1>
            <div>
                <ul id="commentDemo" style="margin:0 0 0 30px;">
				<?php foreach ($comments as $key => $comment) {?>
					<li>
						 <div style="float:left;margin-right:50px;">
							<div>
								<img src="<?= Html::encode($comment['img']['stu_avatar'])?>" alt="">
							</div>
							<div style="color:red;text-align:center;"><?= Html::encode($comment['img']['stu_name'])?></div>
						</div> 
						<div>
						<p>
							<span style="float:left">
								<img src="/public/images/u57.png" alt="">
							</span>
							&nbsp;&nbsp;
							<span style="font-size:16px;panding-buttom:10px"><?php $time = date('Y-m-d',$comment['comment_addtime']);echo $time;?></span>&nbsp;&nbsp;
							<span style=";font-size:16px;panding-buttom:10px;margin-left:300px;color:#FF6600;">人均：￥<?= Html::encode($comment['comment_price'])?></span>
						</p>
						
						<p style="font-size:16px;margin:40px 0 0 0"><?= Html::encode($comment['comment_content'])?></p>
						</div>
					</li>
					<hr style="clear:both">
				<?php }?>
					</ul>
                <div class="clear"></div>
                <!--页码-->
            </div>
       </div>
       <div class="tcdPageCode">
        	<?php echo LinkPager::widget([
            'pagination' =>$pages,
            'prevPageLabel'=>'上一页',
            'nextPageLabel'=>'下一页',
            
        ]);?>
        </div>
	</div>
    </div>
    </div>
</div>
<script src="/public/js/MagicZoom.js" type="text/javascript"></script>
<script src="/public/js/ShopShow.js"></script>
<script>
$(document).ready(function(){
	// 百度地图API功能
    function G(id) {
        return document.getElementById(id);
    }

    var map = new BMap.Map("l-map");
    var keyword = $('.addresss').attr('name');
    map.centerAndZoom(keyword,18);                   // 初始化地图,设置城市和地图级别。
	map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
    map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用

    map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
    map.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
    //map.addControl(new BMap.OverviewMapControl({ isOpen: true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT }));   //右下角，打开

    var localSearch = new BMap.LocalSearch(map);
    localSearch.enableAutoViewport(); //允许自动调节窗体大小
   
    map.clearOverlays();//清空原来的标注
    localSearch.setSearchCompleteCallback(function (searchResult) {
        var poi = searchResult.getPoi(0);
        document.getElementById("l-map").value = poi.point.lng + "," + poi.point.lat;
        map.centerAndZoom(poi.point, 18);
        var marker = new BMap.Marker(new BMap.Point(poi.point.lng, poi.point.lat));  // 创建标注，为要查询的地方对应的经纬度
        map.addOverlay(marker);
        marker.addEventListener("click", function () { this.openInfoWindow(); });
        //marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
    });
    localSearch.search(keyword);

});

/*放大镜*/

</script>