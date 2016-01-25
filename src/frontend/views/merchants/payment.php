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
            <h2 id="bname">北京优时梦想网络科技有限公司</h2>
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
                    <span class="co1" id="favorableInput" atr="" amount="">无优惠</span>
                    <div class="clear"></div>
                </li>
                <li>
                    <span class="w1">淘学金余额</span>
                    <span class="co1" id="amountInput">1,000.00</span>
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
                    <span><input name="payPWD" class="it1" type="password"></span>
                    <span><a href="javascript:GLOBAL.pagebase.forgetPwdInfo('')">忘记支付密码</a></span>
                    <div class="clear"></div>
                </li>
                <li>
                    <span class="w1">&nbsp;</span>
                    <span><input class="bt1" value="立即支付" id="PayBtn" type="button"></span>
                    <div class="clear"></div>
                </li>
            </ul>
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