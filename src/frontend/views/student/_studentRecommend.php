<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\models\student\Students;
$user_id = '1';
$student = Students::HeaderInfo($user_id);
?>

<div class="mt_ri_1">
    <div class="mt_rt" id="topmenus">
        <ul>
            <li class="img">
                <?php if ($student['stu_avatar']) { ?>
                    <img src="<?= Html::encode($student['stu_avatar']) ?>" height="100" width="100">
                <?php }else{ ?>
                    <img src="/public/images/us.jpg" height="100" width="100">
                <?php } ?>
            </li>
            <li class="wi1">
                <h1><?= Html::encode($student['stu_name']) ?></h1>
                <p>手机号：<?= Html::encode($student['stu_phone']) ?></p>
            </li>
            <li class="wi2 wid">
                淘学金余额：<?= Html::encode($student['stu_money']) ?>
            </li>
            <li class="wi2 wid">
                 <?php if ($student['stu_limit_money']) { ?>
                    限额淘学金：<?= Html::encode($student['stu_limit_money']) ?>
                <?php }else{ ?>
                    &nbsp;
                <?php } ?>
            </li>
            <li class="wi3">
                <a href="javascript:void(0)" class="merchant"><span class="bg1">额度申请</span></a>
                <a href="javascript:void(0)" class="top_up"><span class="bg4">充&nbsp;&nbsp;值</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- 弹窗 -->
<div style="display: none;" class="qpzz" id="applayAccount">
    <div class="tip_box" style="margin-top: 0px; margin-left: 0px;">
        <h3>申请账户</h3>   
        <img style="width:25px;height:25px;float: right;position: relative;top:-35px;left:-5px;" src="/public/images/cross27.png" class="close">
        <div class="con_t">
            <p id="titleBox">申请个人淘学金账户</p>
        </div>
        <br><br>
        <div style="float: right; margin-right: 20px;">
            <input type="button" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" value="确定" id="studetailname" name="">&nbsp;&nbsp; 
            <input type="button" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" value="取消" class="close">
        </div>
    </div>   
</div>
<!-- 弹窗 -->
<div style="display: none;" class="qpzz" id="top_up">
    <div class="tip_box" style="margin-top: 0px; margin-left: 0px; height: 200px;">
        <h3>充值金额</h3>   
        <img style="width:25px;height:25px;float: right;position: relative;top:-35px;left:-5px;" src="/public/images/cross27.png" class="close">
        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['student/pay']),
                            'method'=>'post',
                        ])?>
        <div class="con_t">
            <p id="titleBox">充值个人淘学金账户</p>
            <p>请输入充值金额：<input type="text" name="price" />元</p>
        </div>
        <br><br>
        <div style="float: right; margin-right: 20px;">
            <input type="submit" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" value="确定">&nbsp;&nbsp; 
            <input type="button" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" value="取消" class="close">
        </div>
        <?php $form = ActiveForm::end()?>
    </div>   
</div>
<script>
//申请账户弹窗
$(document).on('click', '.merchant', function(){
       $('#applayAccount').show().css('height',document.body.scrollHeight);
})
//申请账户弹窗
$(document).on('click', '.top_up', function(){
       $('#top_up').show().css('height',document.body.scrollHeight);
})
//关闭弹窗
$(document).on('click', '.close', function(){
       $('.qpzz').hide()
})
</script>