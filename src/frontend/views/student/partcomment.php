<?php

/* 
    兼职评论
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
$this->title = '兼职评论';
?>
<link rel="stylesheet" href="/public/css/WdatePicker.css">
<link rel="stylesheet" href="/public/css/validationEngine.css">
<link rel="stylesheet" href="/public/css/pagecss.css">
<link rel="stylesheet" href="/public/css/jianzhijihui.css">
<div class="t_min t_tit">当前位置：<a href="http://www.qutaoxue.net/">首页</a> &gt; 我的趣淘学</div>
<div class="t_min">
        <?php echo $this->render('_studentRecommend') ?>
        <?php echo $this->render('_menuLeft') ?>

        <div class="mt_ri t_ri">
            <div class="mt_rli">
                <div id="top" style="border-bottom: solid 1px #ccd6d7; height: 64px;  width: 950px; border-bottom:">
                    <ul id="uppwUL">
                        <a href="javascript:void(0)" class="save" type="unfinished">
                            <li style="background-color: rgb(243, 151, 0); color: rgb(255, 255, 255);" id="a1">
                                待评论
                            </li>
                        </a>
                        <a href="javascript:void(0)" class="save" type="finished">
                            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 51);" id="a2">
                                已评论
                            </li>
                        </a>
                    </ul>
                </div>
                <ul id="unfinished" class="ul">
                    <?php if ($porder) { ?>
                    <?php foreach ($porder as $key => $value) { ?>
                    <li class="height150 paddingtop gray paddingleft20 martop15 marbot20" style="width: 900px;">
                        <a href="<?= Url::to(['merchants/details'])?>?mer_id=<?= Html::encode($value['mer_id']) ?>">
                            <span class="floatleft marright10"><img src="<?= Html::encode($value['mer_logo']) ?>" height="126" width="168"></span>
                        </a>
                        <div>
                            <div style="height: 25px; float:left;width: 500px;">
                                <div style="float:left;"><span class="floatleft marright10 floatnone" style="font-size: 24px;"><?= Html::encode($value['mer_name']) ?></span></div>
                            </div>
                            <div style="height: 25px; float:left;width: 550px; margin-top: 10px;">
                                <div style="float:left;"><span class="floatleft marright10 floatnone" style="font-size: 18px;">职位：<?= Html::encode($value['job_name']) ?></span></div>
                                <div style="float:right;"><span class="floatleft marright10 floatnone" style="font-size: 18px;">时间：<?= date('Y-m-d',Html::encode($value['work_start'])) ?>至<?= date('Y-m-d',Html::encode($value['work_end'])) ?></span></div>
                            </div>
                            <div class="comment floatright backcolor martop15 marright30 bgYel floatnone partjobtype" name="applaybtn" style="cursor: pointer ;outline: medium none;" type="<?= Html::encode($value['mer_id']) ?>" s_name="<?= Html::encode($value['mer_name']) ?>">评论</div>
                            <div style="height: 25px; float:left;width: 550px; margin-top: 10px;">
                                <div style="float:left;"><span class="floatleft marright10 floatnone" style="font-size: 18px;">薪资：<b style="font-size: 18px;"><?= Html::encode($value['job_money']) ?></b>
                                        <?php if ($value['job_treatment'] == 1) { ?>
                                            元/天
                                        <?php }else if ($value['job_treatment'] == 2) { ?>
                                            元/小时
                                        <?php }else if ($value['job_treatment'] == 3) { ?>
                                            元/周
                                        <?php }else if ($value['job_treatment'] == 4) { ?>
                                            元/月
                                        <?php }else if ($value['job_treatment'] == 5) { ?>
                                            元/次
                                        <?php }else if ($value['job_treatment'] == 6) { ?>
                                            元/个
                                        <?php }else if ($value['job_treatment'] == 7) { ?>
                                            元/单 
                                        <?php }else if ($value['job_treatment'] == 8) { ?>
                                            元/面议
                                        <?php }?>
                                </span></div>
                                <div style="float:right;margin-right: 203px;"><span class="floatleft marright10 floatnone" style="font-size: 18px;">提成：
                                        <?php if ($value['commission'] == 1) { ?>
                                            <b style="color:green;font-size: 18px;">有</b>
                                        <?php }else{ ?>
                                            <b style="color:red;font-size: 18px;">无</b>
                                        <?php } ?></span></div>
                            </div>
                            <div style="height: 25px; float:left;width: 550px; margin-top: 10px;">
                                <div style="float:left;"><span class="floatleft marright10 floatnone" style="font-size: 18px;"><?= Html::encode($value['mer_address']) ?></span></div>
                            </div>
                            
                        </div>
                    </li>
                    <div class="tcdPageCode t_min">
                            <?php echo LinkPager::widget([
                                'pagination' => $pagination,
                                'prevPageLabel'=>'上一页',
                                'nextPageLabel'=>'下一页',
                            ]);?>
                        </div>
                    <?php } ?>
                    <?php }else{ ?>
                        <li class="paddingtop gray paddingleft20 martop15 marbot20" style="width: 900px;">
                             <span style="font-size: 24px;">您暂时没有订单</span>
                        </li>
                    <?php } ?>
                </ul>
                <ul id="finished" class="ul" style="display:none">
                <?php if ($comment) { ?>
                <?php foreach ($comment as $key => $value) { ?>
                
                    <li class="height150 paddingtop gray paddingleft20 martop15 marbot20" style="width: 900px;">
                        <a href="<?= Url::to(['merchants/details'])?>?mer_id=<?= Html::encode($value['mer_id']) ?>">
                            <span class="floatleft marright10"><img src="<?= Html::encode($value['mer_logo']) ?>" height="126" width="168"></span>
                        </a>
                        <div>
                            <div style="height: 30px; float:left; width: 675px;">
                                <div style="float:left;"><span class="floatleft marright10 floatnone" style="font-size: 24px;"><?= Html::encode($value['mer_name']) ?></span></div>
                                <div style="float:right;"><span class="floatleft marright10 floatnone" style="font-size: 16px;"><?= date('Y-m-d',Html::encode($value['comment_addtime'])) ?></span></div>
                            </div>
                            <div style="height: 40px; float: left; width: 550px; margin-top: 5px; margin-bottom: 5px;">
                                <span class="floatleft marright10" style="font-size: 24px;">
                                    <?php if ($value['comment_level'] == '1') { ?>
                                        <img src="/public/images/1.jpg">
                                    <?php }elseif($value['comment_level'] == '2'){ ?>
                                        <img src="/public/images/2.jpg">
                                    <?php }elseif($value['comment_level'] == '3'){ ?>
                                        <img src="/public/images/3.jpg">
                                    <?php }elseif($value['comment_level'] == '4'){ ?>
                                        <img src="/public/images/4.jpg">
                                    <?php }elseif($value['comment_level'] == '5'){ ?>
                                        <img src="/public/images/5.jpg">
                                    <?php }else{ ?>
                                        <img src="/public/images/0.jpg">
                                    <?php } ?>
                                </span>
                            </div>
                            <div style="float:left;width: 550px;">
                                <span style="font-size: 24px;float:left">
                                    <?php 
                                        if(mb_strlen($value['comment_content'])>42){
                                            echo mb_substr($value['comment_content'],0,42,'utf-8').'......';
                                        }else{
                                            echo $value['comment_content'];
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="floatright martop15 marright30" name="applaybtn" style="margin-right: 70px;">已评论商家</div>
                        </div>
                    </li>
                    <div class="tcdPageCode t_min">
                        <?php echo LinkPager::widget([
                            'pagination' => $paginationc,
                            'prevPageLabel'=>'上一页',
                            'nextPageLabel'=>'下一页',
                        ]);?>
                    </div>
                    <?php } ?>
                    <?php }else{ ?>
                        <li class="paddingtop gray paddingleft20 martop15 marbot20" style="width: 900px;">
                             <span style="font-size: 24px;">您暂时没有订单</span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
</div>


<!-- 弹窗 -->
<div style="display: none;" class="qpzz" id="comment">
    <div class="tip_box" style="margin-top: 0px; margin-left: 0px;height: 350px; top: 80px;">
        <h3>订单评论</h3>   
        <img style="width:25px;height:25px;float: right;position: relative;top:-35px;left:-5px;" src="/public/images/cross27.png" class="close">
        <?php $form = ActiveForm::begin([
                        'action' => Url::to(['student/ordercomment']),
                        'method'=>'post',
                    ])?>
            <div class="con_t">
                <p id="s_name"></p>
                <input type="hidden" name="model_id" id="model_id" value="">
                <input type="hidden" name="type" value="part">
                <p>星级评价:&nbsp;&nbsp;<input type='radio' name="comment_level" value="1" />1星
                            &nbsp;&nbsp;<input type='radio' name="comment_level" value="2" />2星
                            &nbsp;&nbsp;<input type='radio' name="comment_level" value="3" />3星
                            &nbsp;&nbsp;<input type='radio' name="comment_level" value="4" />4星
                            &nbsp;&nbsp;<input type='radio' name="comment_level" value="5" />5星
                </p>
                <p>评&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;论 <textarea name="comment_content" cols="20" rows="3"></textarea></p>
            </div>
            <br><br>
            <div style="float: right; margin-right: 20px;">
                <input type="submit" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" value="确定" id="studetailname" name="">&nbsp;&nbsp; 
                <input type="button" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" value="取消" class="close">
            </div>
        <?php $form = ActiveForm::end()?>
    </div>   
</div> 
<script>
    //申请账户弹窗
    $(document).on('click', '.comment', function(){
        var id = $(this).attr('type')
        var s_name = $(this).attr('s_name')
        $('#s_name').html(s_name)
        $('#model_id').val(id)
        $('#comment').show().css('height',document.body.scrollHeight);
    })
    //选项卡
    $(document).on('click', '.save', function(){
        var type=$(this).attr('type');
        $('.save').children().css({ "background-color": "rgb(255, 255, 255)", "color": "rgb(0, 0, 51)" });
        $(this).children().css({ "background-color": "rgb(243, 151, 0)", "color": "rgb(255, 255, 255)" });
        $('.ul').hide();
        $('#'+type).show();
    })

</script>