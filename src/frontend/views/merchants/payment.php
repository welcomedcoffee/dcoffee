<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\Helper;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
$this->title = '付款';
?>
<div class="t_min">
    <!--支付-->
    <div class="t_zhif">
        <div class="t_zhift">
            <h2 id="bname"><?= Html::encode($payDetail['mer_name'])?></h2>
            <?php $form = ActiveForm::begin([
                            'action' => Url::to(['merchants/ConfirmPay']),
                            'method'=>'post',
                            'id'=>'myForm',
                        ])?>
            <ul>
                <li>
                    <span class="w1">消费总额</span>
                    <span>
                   
                        <input id="expenseIput" name="expenseInput" class="it1" type="text">
                        <e style="color:gray;">扣除不参与优惠金额</e>
                    </span>
                    <div class="clear"></div>
                </li>

                <li>
                    <span class="w1">优惠信息</span>
                    <span class="co1" id="favorableInput" atr="" amount="">
                    <?php 
                        if(!$payDetail['preferential']){
                            echo $payDetail['preferential']['preferential_content'];
                        }else{
                            echo "无优惠";
                        }
                    ?>
                    </span>
                    <div class="clear"></div>
                </li>
                <li>
                    <span class="w1">淘学金余额</span>
                    <span class="co1" id="amountInput"><?= Html::encode($user['stu_money'])?></span>
                    <div class="clear"></div>
                </li>
            </ul>
        </div>
        <div class="t_zhifb">
            <h1>
            <input value="" id="faMoney" type="hidden">
            <input value="" id="money" type="hidden">
                <b id="facktInput"></b>
                <div class="clear"></div>
            </h1>
            <ul>
                <li>
                    <span class="w1">输入支付密码：</span>
                    <span><input name="pwd" class="password" type="password"></span>
                    <span><a href="<?= Url::to(['student/studentsave'])?>?type=pay">忘记支付密码&nbsp;&nbsp;</a></span>
                    <span id="error"> </span>
                    <div class="clear"></div>
                </li>
                <li>
                    <span class="w1">&nbsp;</span>
                    <span><input class="bt1" value="立即支付" id="PayBtn" type="submit"></span>
                    <div class="clear"></div>
                </li>
            </ul>
            <?php $form = ActiveForm::end()?>
        </div>
    </div>
</div> 
<!--学生商家兑付弹窗wzl123-->
<div class="qpzz" style="display:none;">
   <div class="tip_box">
    <h3>提交成功</h3>
    <img src="/img/cross27.png" style="width:25px;height:25px;float: right;position: relative;top:-35px;left:-5px;">
     <div class="con_t">
<p id="titleBox"></p>
     </div>
     <br><br>
     <div style="float: right; margin-right: 20px;">
        <input name="" id="studetail" value="完善资料" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" type="button">&nbsp;&nbsp;    
        <input name="" id="back" value="确定" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" type="button">
     </div>
   </div>
</div>
<script src="/public/js/md5-min.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#PayBtn').click(function(){
        var pwd = hex_md5($('.password').val());
        var stu_pwd = "<?= Html::encode($user['stu_pwd'])?>";
       if (pwd!=stu_pwd) {    
            $('#error').html("<span id='error'><font color='red'>支付密码不正确</font></span>");
            $("#myForm").submit(function(){
                return false;
            });
            history.go(0);
       } 
        
    });
</script>      