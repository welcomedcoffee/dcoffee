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
                            'action' => Url::to(['merchants/confirms']),
                            'method'=>'post',
                            'id'=>'myForm',
                        ])?>
                <input type="hidden" name="mer_id" value="<?= Html::encode($payDetail['mer_id'])?>"/>
                <input type="hidden" name="mer_name" value="<?= Html::encode($payDetail['mer_name'])?>"/>
            <ul>
                <li>
                    <span class="w1">消费总额</span>
                    <span>
                   
                        <input id="expenseIput" name="costTotal" class="it1" type="text">
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

<script src="/public/js/md5-min.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#PayBtn').click(function(){
        
        var pwd = hex_md5($('.password').val());
        var stu_pwd = "<?= Html::encode($user['stu_pwd'])?>";
        if (stu_pwd=='' || stu_pwd==null) {
            if (confirm("请完善资料！！")) {
                location.href='/index.php/student/security';
            }
        }else{
            history.go(0);
        }
        
        if (pwd!=stu_pwd) {    
            $('#error').html("<span id='error'><font color='red'>支付密码不正确</font></span>");
            $("#myForm").submit(function(){
                return false;
            });
            
       } 
        
    });
</script>      