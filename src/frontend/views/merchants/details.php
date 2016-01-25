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
        <a href="http://www.qutaoxue.net/">首页</a>
        &gt;
        <a href="http://www.qutaoxue.net/ParttimeList?url=jzjh">趣消费</a>
        &gt;
        <a href="javascript:void(0)" id="bussiname">北京优时梦想网络科技有限公司</a>
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
                    <p>地址：嘉悦广场4号楼1704</p>
                    <p>电话：18612306912</p>
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
                        
趣淘学主要是大学生时间金融平台，通过互联网、移动互联网和大数据技术创新为大学生人群提供创新、安全、简单、快速的个人兼职及消费平台服务。 
趣淘学是专门为大学生提供兼职、提前消费的服务平台，真正做到了信息真实有效、提前消费服务、兼职推荐。我们的定位是帮助大学生兼职成长，有效的解决大学
生资金不足的问题，同时通过用课余时间以做兼职来实现自己的日常消费。并提供真实、有效、优质的兼职信息给大学生。帮助大学生积累工作经验，为就业打好基
础。 
平台成立于2015年，我们致力于开辟大学生时间金融，在实现提前消费的同时，为大学生提供兼职，提升自我经验积累，丰富课余生活。为企业提供兼职人力需
求方面的系统化解决方案，免费为企业提供兼职服务。
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
