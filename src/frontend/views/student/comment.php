<?php

/* 
    商品评论
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = '商品评论';
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
                    <li class="height150 paddingtop gray paddingleft20 martop15 marbot20" style="width: 900px;">
                        <a href="#">
                            <span class="floatleft marright10"><img src="/public/images/parttime/2_1452230290691_jztp.jpg" height="126" width="168"></span>
                        </a>
                        <div>
                            <div style="height: 40px; float:left;width: 610px;">
                                <div style="float:left;"><span class="floatleft marright10 floatnone" style="font-size: 24px;">西北老狼鳗鱼店</span></div>
                                <div style="float:right;"><span class="floatleft marright10 floatnone" style="font-size: 24px;">实付金额：<b style="font-size: 24px;">60元</b></span></div>
                            </div>
                                
                            <div style="height: 40px; float:left;margin-top: 60px;width: 550px;">
                                <span class="floatleft marright10 floatnone" style="font-size: 24px;">地址：江宁区科学园天元东路891天景山商业中心</span>
                            </div>
                            <div class="comment floatright backcolor martop15 marright30 bgYel floatnone partjobtype" name="applaybtn" style="cursor: pointer ;outline: medium none;" type="1" s_name="西北老狼鳗鱼店">评论</div>
                        </div>
                    </li>
                </ul>
                <ul id="finished" class="ul" style="display:none">
                    <li class="height150 paddingtop gray paddingleft20 martop15 marbot20" style="width: 900px;">
                        <a href="#">
                            <span class="floatleft marright10"><img src="/public/images/parttime/2_1452230290691_jztp.jpg" height="126" width="168"></span>
                        </a>
                        <div>
                            <div style="height: 40px; float:left; width: 675px;">
                                <div style="float:left;"><span class="floatleft marright10 floatnone" style="font-size: 24px;">西北老狼鳗鱼店sssssss</span></div>
                                <div style="float:right;"><span class="floatleft marright10 floatnone" style="font-size: 16px;">2016-01-26</span></div>
                            </div>
                            <div style="height: 40px; float:left;margin-top: 10px;width: 550px;">
                                <span class="floatleft marright10" style="font-size: 24px;">
                                    <img src="/public/images/5.jpg">
                                </span>
                            </div>
                            <div style="height: 40px; float:left;margin-top: 16px;width: 550px;">
                                <span class="floatleft marright10" style="font-size: 24px;">地址：江宁区科学园天元东路891天景山商业中心</span>
                            </div>
                            <div class="comment floatright martop15 marright30" name="applaybtn" style="margin-right: 70px;">已评论商家</div>
                        </div>
                    </li>
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
                <input type="hidden" name="type" value="goods">
                <p>星级评价:&nbsp;&nbsp;<input type='radio' name="comment_level" value="1" />1星
                            &nbsp;&nbsp;<input type='radio' name="comment_level" value="2" />2星
                            &nbsp;&nbsp;<input type='radio' name="comment_level" value="3" />3星
                            &nbsp;&nbsp;<input type='radio' name="comment_level" value="4" />4星
                            &nbsp;&nbsp;<input type='radio' name="comment_level" value="5" />5星
                </p>
                <p>人均消费 <input type="text" name="comment_price" />元</p>
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