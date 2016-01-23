<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\course\Course;
//$course = Course::Coursermd();
?>

<div class="mt_ri_1">
    <div class="mt_rt" id="topmenus"><ul><li class="img"> <img src="/public/images/us.jpg" height="100" width="100"></li><li class="wi1">   <h1>阿阳</h1>   <p>手机号：18511031789</p></li><li class="wi2 wid">淘学金余额<span class="item"><img src="/public/images/wenhao.png" style="height: 18px;position: relative;top:-4px;margin-left:5px"><div class="tooltip_description" style="display:none">淘学金是趣淘学平台的虚拟货币,在趣淘学网站上,学生会员可以用淘学金在指定商家消费,也可以通过兼职获取淘学金.</div></span>：1,000.00</li><li class="wi2 wid">结算日：每月25日</li><li class="wi3">   <a href="javascript:void(0)" class="merchant"><span class="bg1">额度申请</span></a><!-- <a href="/merchant/merchantParttimeList"><span class="bg2">兼职结算</span></a> <a href="/merchant/merchantParttimeList"><span class="bg3">兼职审核</span></a> --></li></ul> <div class="clear"></div></div>
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
<script>
//关闭弹窗
$(document).on('click', '.merchant', function(){
       $('#applayAccount').show().css('height',document.body.scrollHeight);
})
//关闭弹窗
$(document).on('click', '.close', function(){
       $('.qpzz').hide()
})
</script>