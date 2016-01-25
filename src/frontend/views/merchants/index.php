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
<style type="text/css">
    .bg{background:#FF8400 none repeat scroll 0% 0%;}
    .t_skey ul li span a {margin: 0px 5px;padding: 2px 5px;}
    .t_skey ul li span a.bg{ color:#fff;}
</style>
<div class="t_min t_tit">
        当前位置：
        <a href="<?= Url::to(['site/index'])?>">首页</a>
        &gt; 优质商家
    </div>
    <!--商家 搜索-->
    <div class="t_min">
        <!--t_skey-->
        <div class="t_skey">
            <ul>
            <?php if($types){?>
                <li id="hotcategory">
                    <strong>热门分类:</strong>
                    <div style="margin-left:60px">
                    <span>
                        <a href="<?php echo \Yii::$app->urlManager->createUrl(['merchants/index',$keyword,array('type'=>0)]); ?>"
                        <?php if($keyword['type']=='0' || empty($keyword['type'])){
                            echo "class='bg'";
                            } ?>
                            >全部</a>   
                    </span>
                    <?php foreach ($types as $key => $type) {?>
                    <span><a href="<?php echo \Yii::$app->urlManager->createUrl(['merchants/index',$keyword,array('type'=>$type['type_id'])])?>"
                    <?php if($keyword['type']==$type['type_id']){
                            echo "class='bg'";
                            } ?>>
                    <?= Html::encode($type['type_name'])?></a></span>
                    <?php }?>
                    <div class="clear"></div></div>
                </li>
            <?php }?>    
                <li id="areCategory"> <strong>全部区域:</strong><span><a href="javascript:void(0)" atr="">不限</a></span><span><a href="javascript:void(0)" atr="110100"> 东城区</a></span><span><a href="javascript:void(0)" atr="110200"> 西城区</a></span><span><a href="javascript:void(0)" atr="110500"> 朝阳区</a></span><span><a href="javascript:void(0)" atr="110600"> 丰台区</a></span><span><a href="javascript:void(0)" atr="110700"> 石景山区</a></span><span><a href="javascript:void(0)" atr="110800"> 海淀区</a></span><span><a href="javascript:void(0)" atr="110900"> 门头沟区</a></span><span><a href="javascript:void(0)" atr="111100"> 房山区</a></span><span><a href="javascript:void(0)" atr="111200"> 通州区</a></span><span><a href="javascript:void(0)" atr="111300"> 顺义区</a></span><span><a href="javascript:void(0)" atr="111400"> 昌平区</a></span><span><a href="javascript:void(0)" atr="111500"> 大兴区</a></span><span><a href="javascript:void(0)" atr="111600"> 怀柔区</a></span><span><a href="javascript:void(0)" atr="111700"> 平谷区</a></span><span><a href="javascript:void(0)" atr="112800"> 密云县</a></span><span><a href="javascript:void(0)" atr="112900"> 延庆县</a></span><div class="clear"></div></li>
            </ul>
        </div>
        <!--t_skey end-->
        <!--t_snav -->
        <div class="t_snav">
            <ul id="rowCategory">
                <li class="bg">
                    <a href="###" class="a1" id="defaultCatgory" atr="0">默认</a>
                </li>
                <li>
                    <a href="###" id="salesCategory" atr="1">销量</a>
                </li>

            </ul>
            <div class="clear"></div>
        </div>
        <!--t_snav end-->
        <!--t_slist -->
        <div class="t_slist">
            <ul>
        <?php foreach($mers as $key=>$mer){?>
            <li>
            <p>
                 <a href="<?= Url::to(['merchants/details'])?>&mer_id=<?= Html::encode($mer['mer_id'])?>"><img src="<?= Html::encode($mer['mer_logo'])?>" alt="商家logo" height="205" width="256"></a>
            </p>
            <h1>
                <a href="<?= Url::to(['merchants/details'])?>&mer_id=<?= Html::encode($mer['mer_id'])?>"><?= Html::encode($mer['mer_name'])?></a>
            </h1>
            <h2 title=""> </h2>
            <div class="ifo">
                <span>
                    <em class="bg"></em><em class="bg"></em><em class="bg"></em><em class="bg"></em><em class="bg"></em>
                </span>
                <b class="address" title="<?= Html::encode($mer['mer_address'])?>">
                <?= Html::encode($mer['mer_address'])?></b>
                <div class="clear"></div>
            </div>
            <div class="moy">
                人均<strong>暂无</strong>
            </div>
        </li>
        <?php }?>
        </ul>

            <div class="clear"></div>
        </div>
        <!--t_slist end-->
    </div>
    <!--页码-->
    <div class="tcdPageCode t_min" id="pages">
    <?php echo LinkPager::widget([
            'pagination' =>$pages,
            'prevPageLabel'=>'上一页',
            'nextPageLabel'=>'下一页',
            
        ]);?>
    </div>   