<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\Helper;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
$this->title = '兼职机会';
?>

<link rel="stylesheet" type="text/css" href="/public/css/pagecss.css" />
<link rel="stylesheet" type="text/css" href="/public/css/jianzhijihui.css" />
<link rel="stylesheet" type="text/css" href="/public/css/validationEngine.css" />
<link rel="stylesheet" type="text/css" href="/public/css/WdatePicker.css" />
<link rel="stylesheet" type="text/css" href="/public/css/ui.css" />
<style type="text/css">
    .bg{background:#FF8400 none repeat scroll 0% 0%;}
</style>
<div class="t_min t_tit">
        当前位置：
        <a href="#">首页</a>
        &gt; 兼职机会
    </div>
    <!--商家 搜索-->
    <div class="t_min">
        <!--t_skey-->
        <div class="t_skey">
            <ul>
                <li id="hotcategory">
                    <strong>热门分类:</strong>
                    <span>
                        <a href="<?php echo \yii::$app->urlManager->createUrl(['parttime/index',$keyword,array('type'=>'0')])?>" 
                        <?php if($keyword['type']=='0' || empty($keyword['type'])){
                            echo "class='bg'";
                            }?>
                        > 不限</a>
                    </span>
                    <?php foreach($types as $key=>$type){?>
                    <span><a href="<?php echo \yii::$app->urlManager->createUrl(['parttime/index',$keyword,array('type'=>$type['part_id'])])?>" 
                    <?php if($keyword['type']==$type['part_id']){
                        echo "class='bg'";
                        }?>
                    ><?= Html::encode($type['part_name'])?></a></span>
                    <?php }?>
                    <div class="clear"></div>
                </li>
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
        <!--t_snav end-->
        <!--t_zlist1l-->
        <div class="t_zlistl t_le wid1140 ">
            <div class="t_snav">

                <ul id="rowCategory">
                    <li class="bg wid200">
                        <a href="###" class="a1" id="defaultCatgory" atr="0">默认</a>
                    </li>
                    <li class="wid200">
                        <a href="###" id="salesCategory" atr="1">工资<img src="public/images/sanjiaoxia.png" class="marleft5" id="imgS" width="9"></a>
                    </li>
                    <li class="wid200">
                        <a href="###" id="isdeduct" atr="2">提成</a>
                    </li>
                    <li class="wid45 textleft bor0 marleft5 ">
                        工作时间：
                        <input name="workBegin" id="workBegin" placeholder="开始时间" class="Wdate wid120 bor0" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd',maxDate:'#F{$dp.$D(\'workEnd\')}' })" type="text">
                        至
                        <input name="workEnd" id="workEnd" class="Wdate validate[required] wid120 bor0" placeholder="结束时间" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd',minDate:'#F{$dp.$D(\'workBegin\')}' })" type="text">
                        <div class="dis back textcenter white" id="btnSeach">搜索</div>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>



            <ul id="worklist">
                <li class="height150 paddingtop gray paddingleft20 martop15 marbot20">
                    <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=253&amp;bid=2157&amp;wty=7">
						
                        <span class="floatleft marright10"><img src="/public/images/parttime/2157_1453168522050_jztp_suolue.png" height="126" width="168"></span>
                    </a>
                    <div class="floatright backcolor martop15 marright30 bgYel" name="applaybtn" style="cursor: pointer ;" onclick="javascript:GLOBAL.pagebase.btnApplyContent(2157,253)">我要抢单</div>
                     <span class="floatright martop15 marright80">
                        <b class="marright10">120元/天</b>    无提成
                    </span>
                    <span class="floatnone marbot20">

                        <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=253&amp;bid=2157">鲜花长期客服</a>
					<span class="backcolor floatnone marleft5 partjobtype">寒假兼职</span>
					</span>

                    <span class="floatnone"><span class="floatnone dis">工作时间：01.19-02.15 </span><span class=" floatright dis wid500">结算方式：完工结算</span></span>
                    <span class="floatnone"><span class="floatnone dis">工作地点：昌平区</span><span class=" floatright dis wid500">招聘人数：<b>2</b>人</span></span>
                    <div class="clear"></div>
                </li>
            
                <li class="height150 paddingtop gray paddingleft20 martop15 marbot20">
                    <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=251&amp;bid=2152&amp;wty=8">
						
                        <span class="floatleft marright10"><img src="/public/images/parttime/logo1.png" height="126" width="168"></span>
                    </a>
                    <div class="floatright backcolor martop15 marright30 bgYel" name="applaybtn" style="cursor: pointer ;" onclick="javascript:GLOBAL.pagebase.btnApplyContent(2152,251)">我要抢单</div>
                     <span class="floatright martop15 marright80">
                        <b class="marright10">200元/天</b>    无提成
                    </span>
                    <span class="floatnone marbot20">

                        <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=251&amp;bid=2152">宠物美容师</a>
					<span class="backcolor floatnone marleft5 partjobtype">寒假兼职</span>
					</span>

                    <span class="floatnone"><span class="floatnone dis">工作时间：02.12-02.17 </span><span class=" floatright dis wid500">结算方式：完工结算</span></span>
                    <span class="floatnone"><span class="floatnone dis">工作地点：大兴区</span><span class=" floatright dis wid500">招聘人数：<b>2</b>人</span></span>
                    <div class="clear"></div>
                </li>
            
                <li class="height150 paddingtop gray paddingleft20 martop15 marbot20">
                    <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=250&amp;bid=2152&amp;wty=8">
						
                        <span class="floatleft marright10"><img src="/public/images/parttime/logo1.png" height="126" width="168"></span>
                    </a>
                    <div class="floatright backcolor martop15 marright30 bgYel" name="applaybtn" style="cursor: pointer ;" onclick="javascript:GLOBAL.pagebase.btnApplyContent(2152,250)">我要抢单</div>
                     <span class="floatright martop15 marright80">
                        <b class="marright10">100元/天</b>    无提成
                    </span>
                    <span class="floatnone marbot20">

                        <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=250&amp;bid=2152">宠物美容师助理</a>
					<span class="backcolor floatnone marleft5 partjobtype">寒假兼职</span>
					</span>

                    <span class="floatnone"><span class="floatnone dis">工作时间：02.12-02.17 </span><span class=" floatright dis wid500">结算方式：完工结算</span></span>
                    <span class="floatnone"><span class="floatnone dis">工作地点：大兴区</span><span class=" floatright dis wid500">招聘人数：<b>2</b>人</span></span>
                    <div class="clear"></div>
                </li>
            
                <li class="height150 paddingtop gray paddingleft20 martop15 marbot20">
                    <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=249&amp;bid=2152&amp;wty=8">
						
                        <span class="floatleft marright10"><img src="/public/images/parttime/logo1.png" height="126" width="168"></span>
                    </a>
                    <div class="floatright backcolor martop15 marright30 bgYel" name="applaybtn" style="cursor: pointer ;" onclick="javascript:GLOBAL.pagebase.btnApplyContent(2152,249)">我要抢单</div>
                     <span class="floatright martop15 marright80">
                        <b class="marright10">100元/天</b>    无提成
                    </span>
                    <span class="floatnone marbot20">

                        <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=249&amp;bid=2152">宠物美容师助理</a>
					
					</span>

                    <span class="floatnone"><span class="floatnone dis">工作时间：02.01-02.06 </span><span class=" floatright dis wid500">结算方式：完工结算</span></span>
                    <span class="floatnone"><span class="floatnone dis">工作地点：大兴区</span><span class=" floatright dis wid500">招聘人数：<b>2</b>人</span></span>
                    <div class="clear"></div>
                </li>
            
                <li class="height150 paddingtop gray paddingleft20 martop15 marbot20">
                    <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=248&amp;bid=2152&amp;wty=8">
						
                        <span class="floatleft marright10"><img src="/public/images/parttime/logo1.png" height="126" width="168"></span>
                    </a>
                    <div class="floatright backcolor martop15 marright30 bgYel" name="applaybtn" style="cursor: pointer ;" onclick="javascript:GLOBAL.pagebase.btnApplyContent(2152,248)">我要抢单</div>
                     <span class="floatright martop15 marright80">
                        <b class="marright10">200元/天</b>    无提成
                    </span>
                    <span class="floatnone marbot20">

                        <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=248&amp;bid=2152">宠物美容师</a>
					<span class="backcolor floatnone marleft5 partjobtype">寒假兼职</span>
					</span>

                    <span class="floatnone"><span class="floatnone dis">工作时间：02.01-02.06 </span><span class=" floatright dis wid500">结算方式：完工结算</span></span>
                    <span class="floatnone"><span class="floatnone dis">工作地点：大兴区</span><span class=" floatright dis wid500">招聘人数：<b>2</b>人</span></span>
                    <div class="clear"></div>
                </li>
            
                <li class="height150 paddingtop gray paddingleft20 martop15 marbot20">
                    <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=131&amp;bid=2&amp;wty=1">
						
                        <span class="floatleft marright10"><img src="/public/images/parttime/2_1452230290691_jztp.jpg" height="126" width="168"></span>
                    </a>
                    <div class="floatright backcolor martop15 marright30 bgYel" name="applaybtn" style="cursor: pointer ;" onclick="javascript:GLOBAL.pagebase.btnApplyContent(2,131)">我要抢单</div>
                     <span class="floatright martop15 marright80">
                        <b class="marright10">100元/天</b>    有提成
                    </span>
                    <span class="floatnone marbot20">

                        <a href="http://www.qutaoxue.net/ParttimeShow?url=jzjh&amp;jid=131&amp;bid=2">影城推广人员</a>
					<span class="backcolor floatnone marleft5 partjobtype">日结兼职</span><span class="backcolor floatnone marleft5 partjobtype">周末兼职</span>
					</span>

                    <span class="floatnone"><span class="floatnone dis">工作时间：01.09-02.28 </span><span class=" floatright dis wid500">结算方式：当天结算</span></span>
                    <span class="floatnone"><span class="floatnone dis">工作地点：东城区</span><span class=" floatright dis wid500">招聘人数：<b>5</b>人</span></span>
                    <div class="clear"></div>
                </li>
            </ul>
            <div class="clear"></div>
            <!--页码-->
            <div class="tcdPageCode"><span class="disabled">上一页</span><span class="current">1</span><span class="disabled">下一页</span></div>
        </div>
        <!--t_zlistl end-->

        <div class="clear"></div>
    </div>
<div class="qpzz" style="display:none">
    <div class="tip_box" style="height:300px;width:500px">
        <h3>兼职抢单</h3>
        <img src="/public/images/cross27.png" style="width:25px;height:25px;float: right;position: relative;top:-35px;left:-5px;">
        <div class="con_t">
            <p>申请理由：<textarea rows="8" cols="42" id="selfInput"></textarea></p>
        </div>
        <br>
        <div style="float: right; margin-right: 20px;">
            <input name="" id="btnApplyContent" value="确定" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" type="button">
        </div>
   </div>
</div>