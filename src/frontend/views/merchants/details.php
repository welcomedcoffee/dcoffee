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
                          <span class="bg"></span>  <span class="bg"></span>  <span class="bg"></span>  <span class="bg"></span>  <span class="bg"></span>
                        </p><div class="clear"></div>
                    <p></p>
                    <p>地址：<?= Html::encode($mer_details['mer_address'])?></p>
                    <p>电话：<?= Html::encode($mer_details['mer_phone'])?></p>
                    <div class="t_sdtextbt">
                        <a href="<?= Url::to(['merchants/pay'])?>" id="btnConvert">淘学金兑换<span style="display: none; width: 0px; height: 0px;" id="transmark"></span></a>
                    </div>
                </div>
                <div class="clear"></div>
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