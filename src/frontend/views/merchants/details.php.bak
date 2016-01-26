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
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ZT4wsbKvt0nB8pvbGAREQisb"></script>
<style type="text/css">
	.ys{background:#FF8400;}
	.moy{color:#FF8400;}
	#l-map{height:300px;width:100%;}
    #r-result{width:100%;}
</style>
    <div class="t_min t_tit">
        当前位置：
        <a href="<?= Url::to(['site/index'])?>">首页</a>
        &gt;
        <a href="<?= Url::to(['merchants/index'])?>">趣消费</a>
        &gt;
        <a href="javascript:void(0)" id="bussiname"><?= Html::encode($mer_details['mer_name'])?></a>
    </div>
    <div class="t_min">
        <div class="t_sdat" id="buinessContentDemo">
            <!--商家 详情-->
            <div class="connected-carousels" style="float:left">
                <div class="stage" style="border:2px solid #DDDDDD;border-radius:7px">
                    <div class="carousel carousel-stage">
                        <ul style="margin:5px 5px 0 5px ">
                            <li ><img src="<?= Html::encode($mer_details['mer_logo'])?>" alt="" id="img" height="280" width="460"></li>
                        </ul>
                    </div> 
                </div>
				<br>
                <div class="navigation" style="height:81px;width:294px;border:2px solid #DDDDDD;border-radius:7px">
                    <div class="carousel carousel-navigation" style="height:81px;width:294px">
                        <ul style="height:81px;width:294px;">
                            <li id="first" style="float:left;margin:5px 5px 5px 5px "><img src="<?= Html::encode($mer_details['mer_image1'])?>" alt="" height="71" width="88"></li>
							<li id="second" style="float:left;margin:5px 5px 5px 5px"><img src="<?= Html::encode($mer_details['mer_image1'])?>" alt="" height="71" width="88"></li>
							<li id="third" style="float:left;margin:5px 5px 5px 5px"><img src="<?= Html::encode($mer_details['mer_image1'])?>" alt="" height="71" width="88"></li>
                        </ul>
                    </div>
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
                        <a href="<?= Url::to(['merchants/pay'])?>" id="btnConvert">淘学金兑换<span style="display: none; width: 0px; height: 0px;" id="transmark"></span></a>
                    </div>
                </div>
                <div class="clear"></div>
                <!--商家位置-->
                <div class="t_sdjj">
                    <h1>
                        <span class="bg nb">商家位置</span>
                        <div class="clear"></div>
                    </h1>
                   
                    <div class="t_sdjji"  style="float:left;width:450px">
                        <div id="mapAdress">
			                <div id="l-map"></div>
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
                    <p class="addresss" name="<?= Html::encode($mer_details['mer_address'])?>">
                    商家地址：<?= Html::encode($mer_details['mer_address'])?></p>
                    <p>预约电话：<?= Html::encode($mer_details['mer_phone'])?></p>
                </div>
                <div class="clear"></div>
                </div>
                <!--商家介绍-->
                <div class="t_sdjj">
                    <h1>
                        <span class="bg nb">商家介绍</span>
                        <div class="clear"></div>
                    </h1>
                    <div class="t_sdjji">
                        <?= Html::encode($mer_details['mer_introduce'])?>
                    </div>
                </div>
            </div>   
            <!--评论-->
            <div class="t_sdat">
        <div class="t_scent">
            <h1>
               <!--   <span class="bg nb">
                    <a href="javascript:void(0)" id="orderCommentBtn">订单评论</a>
                </span>-->
                <span class="bg nb">
                    <a href="javascript:void(0)" id="jobCommentBtn">兼职评论</a>
                </span>
                <di v class="clear"></div>
            </h1>
            <div class="t_scenti">
                <ul id="commentDemo"></ul>
    
                <div class="clear"></div>
                <!--页码-->
                <div class="tcdPageCode"><span class="disabled">上一页</span><span class="disabled">下一页</span></div>
            </div>
       </div>
    </div>

    </div>
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
</script>    
