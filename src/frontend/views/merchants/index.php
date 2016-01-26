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
    .ys{background:#FF8400;}
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
                            >不限</a>   
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
                <li id="areCategory"> <strong>全部区域:</strong>
                    <span>
                        <a href="<?php echo \Yii::$app->urlManager->createUrl(['merchants/index',$keyword,array('region'=>0)]); ?>" 
                        <?php if($keyword['region']=='0' || empty($keyword['region'])){
                            echo "class='bg'";
                            } ?>>不限</a></span>
                        <?php foreach ($regions as $key => $region) {?>
                            <span><a href="<?php echo \Yii::$app->urlManager->createUrl(['merchants/index',$keyword,array('region'=>$region['region_id'])])?>" 
                            <?php if($keyword['region']==$region['region_id']){
                            echo "class='bg'";
                            } ?>>

                            <?= Html::encode($region['region_name'])?></a></span>
                        <?php }?>            
                            <div class="clear"></div></li>
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
                 <a href="<?= Url::to(['merchants/details'])?>?mer_id=<?= Html::encode($mer['mer_id'])?>"><img src="<?= Html::encode($mer['mer_logo'])?>" alt="商家logo" height="205" width="256"></a>
            </p>
            <h1>
                <a href="<?= Url::to(['merchants/details'])?>?mer_id=<?= Html::encode($mer['mer_id'])?>"><?= Html::encode($mer['mer_name'])?></a>
            </h1>
            <h2 title=""> </h2>
            <div class="ifo">
            <?php if ($mer['mer_level']=='1') {?>
                <span>
                    <em class="ys"></em><em class="bg"></em><em class="bg"></em><em class="bg"></em><em class="bg"></em>
                </span>
            <?php }elseif ($mer['mer_level']=='2') {?>
                <span>
                    <em class="ys"></em><em class="ys"></em><em class="bg"></em><em class="bg"></em><em class="bg"></em>
                </span>
            <?php }elseif ($mer['mer_level']=='3') {?>
                <span>
                    <em class="ys"></em><em class="ys"></em><em class="ys"></em><em class="bg"></em><em class="bg"></em>
                </span>
            <?php }elseif ($mer['mer_level']=='4') {?>
                <span>
                    <em class="ys"></em><em class="ys"></em><em class="ys"></em><em class="ys"></em><em class="bg"></em>
                </span>
            <?php }else{?>
                <span>
                    <em class="ys"></em><em class="ys"></em><em class="ys"></em><em class="ys"></em><em class="ys"></em>
                </span>
            <?php }?>    
                <b class="address" title="<?= Html::encode($mer['mer_address'])?>">
                <?= Html::encode($mer['mer_address'])?></b>
                <div class="clear"></div>
            </div>
            <div class="moy">
                人均
                <?php if($mer['mer_capita']=='0' || empty($mer['mer_capita'])){?>
                <strong>暂无</strong>
                <?php }else{?>
                <strong>￥<?= Html::encode($mer['mer_capita'])?></strong>
                <?php }?>
            </div>
        </li>
        <?php }?>
        </ul>

            <div class="clear"></div>
        </div>
        <!--t_slist end-->
    </div>
    <!--页码-->
    <div class="tcdPageCode t_min" >
    <?php echo LinkPager::widget([
            'pagination' =>$pages,
            'prevPageLabel'=>'上一页',
            'nextPageLabel'=>'下一页',
            
        ]);?>
    </div>   