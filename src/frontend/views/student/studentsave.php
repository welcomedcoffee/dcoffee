<?php

/* 
    修改密码
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
$this->title = '修改密码';
?>
<link rel="stylesheet" href="/public/css/validationEngine.css">
<link rel="stylesheet" href="/public/css/jquery.css">
<div class="t_min t_tit">当前位置：<a href="http://www.qutaoxue.net/">首页</a> &gt; 我的趣淘学</div>
<div class="t_min">
        <?php echo $this->render('_studentRecommend') ?>
        <?php echo $this->render('_menuLeft') ?>

        <div class="mt_ri t_ri">

            <div class="mt_rli">
                <div id="top" style="border-bottom: solid 1px #ccd6d7; height: 64px; border-bottom:">
                    <ul id="uppwUL">
                    <?php if($type == 'pwd') { ?>
                        <a href="javascript:void(0)" class="save" type="pwd">
                            <li style="background-color: rgb(243, 151, 0); color: rgb(255, 255, 255);" id="a1">
                                <b>修改登录密码</b>
                            </li>
                        </a>
                        <a href="javascript:void(0)" class="save" type="pay">
                            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 51);" id="a2">
                                <b>修改支付密码</b>
                            </li>
                        </a>
                        <a href="javascript:void(0)" class="save" type="phone">
                            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 51);" id="a3">
                                <b>手机验证</b>
                            </li>
                        </a>
                    <?php }elseif ($type == 'phone') { ?>
                        <a href="javascript:void(0)" onclick="GLOBAL.pagebase.updateClassPage(1)">
                            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 51);" id="a1">
                                <b>修改登录密码</b>
                            </li>
                        </a>
                        <a href="javascript:void(0)" onclick="GLOBAL.pagebase.updateClassPage(2)">
                            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 51);" id="a2">
                                <b>修改支付密码</b>
                            </li>
                        </a>
                        <a href="javascript:void(0)" onclick="GLOBAL.pagebase.updateClassPage(3)">
                            <li style="background-color: rgb(243, 151, 0); color: rgb(255, 255, 255);" id="a3">
                                <b>手机验证</b>
                            </li>
                        </a>
                    <?php }elseif ($type == 'pay') { ?>
                        <a href="javascript:void(0)" onclick="GLOBAL.pagebase.updateClassPage(1)">
                            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 51);" id="a1">
                                <b>修改登录密码</b>
                            </li>
                        </a>
                        <a href="javascript:void(0)" onclick="GLOBAL.pagebase.updateClassPage(2)">
                            <li style="background-color: rgb(243, 151, 0); color: rgb(255, 255, 255);" id="a2">
                                <b>修改支付密码</b>
                            </li>
                        </a>
                        <a href="javascript:void(0)" onclick="GLOBAL.pagebase.updateClassPage(3)">
                            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 51);" id="a3">
                                <b>手机验证</b>
                            </li>
                        </a>
                    <?php } ?>
                        
                        

                    </ul>
                </div>

                <div id="register">
                    <?php if($type == 'pwd') { ?>
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['student/studentupdate']),
                            'method'=>'post',
                            'options' => ['enctype' => 'multipart/form-data',
                                            'id' => 'pwd',
                                            'class' => 'form'
                                        ],
                        ])?>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;输入旧密码&nbsp;:
                                <input id="oldPWD" class="in1 validate[required]" placeholder="请输入旧密码" style="height:25px" type="password">
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">长度六位以上的数字和字母结合</span>
                            <br> <br> 
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;设置新密码&nbsp;:
                                <input id="newPwd" class="in1 validate[required,custom[pwd]]" placeholder="请输入新密码" style="height:25px" type="password">
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">不想更换请留空</span>
                            <br> <br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;重复新密码&nbsp;:
                                
                                <input name="isPassword" id="isPassword" class="in1 validate[condRequired[password],equals[newPwd]]" placeholder="请输入确认密码" style="height:25px" type="password">
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">再次输入与上面相同的密码</span>
                            <br> <br> 
                            <input id="btnUpdateLogin" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 15%;" type="button">
                        <?php $form = ActiveForm::end()?>

                        <form class="form" id="pay" style="display: none;">
                            <span style="font-size: 12px;margin-left:5px">
                                <span style="color: #da1f29">*</span>
                                <span style="display:inline-block;">您的手机号码</span>&nbsp;:
                                <input name="mobile" id="mobile" class="in1 validate[required,custom[mobile]] " placeholder="请输入手机号码" style="height:25px" type="text" value="<?= Html::encode($student['stu_phone']) ?>">
                            </span>


                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">&nbsp;稍后您的手机将会收到短信验证码 60s后重发</span>
                            <br><br>


                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;短信验证码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="smsValidCode" id="smsValidCode" value="" type="hidden">
                                <input name="smsValCode" id="smsValCode" data-prompt-position="centerRight:125,0" class="in2 validate[required] " placeholder="您的手机短信验证码" style="height:25px" type="text">

                            </span> <span class="mag" style="cursor: pointer; background:#46babb;" id="smsValidCodeText" atr="0"> 获取验证码 </span>
                            &nbsp;&nbsp;
                            <span style="color: #9f9fa0; font-size: 12px;"></span>
                            <br> <br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;设置新密码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="paypassword" id="paypassword" class="in1 validate[required,custom[pwd]]" placeholder="请输入新密码" style="height:25px" type="password">

                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">长度为六位以上的数字和字母的组合</span>
                            <br><br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;重复新密码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="ispaypassword" id="ispaypassword" class="in1 validate[condRequired[paypassword],equals[paypassword]]" placeholder="请输入确认密码" style="height:25px" type="password">

                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">您再次输入与上面相同的密码</span>
                            <br> <br> <br>
                            <input id="updatePAYBTN" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 12%;" type="button">
                        </form>



                        <form class="form" id="phone" style="display: none">
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;您的手机号码&nbsp;&nbsp;:&nbsp;
                                <input name="str_phone" id="str_phone" class="in1 validate[required,custom[mobile]] str_phone" placeholder="请输入手机号码" style="height:25px" type="text" value="<?= Html::encode($student['stu_phone']) ?>">

                            </span>
s
                            <input name="smsValidCode1" id="smsValidCode1" value="" type="hidden">
                            <br> <br>
                            <span style="font-size: 12px;margin-left:20px">
                                <span style="color: #da1f29">*</span>
                                &nbsp;<span>短信验证码</span>:&nbsp;
                                <input name="phone_code" id="phone_code" data-prompt-position="centerRight:125,0" class="in2 validate[required] phone_code" placeholder="您的手机短信验证码" style="height:25px" type="text">
                                <span id="pcode"></span>
                                <style type="text/css">
                                    .mag {
                                        color: #fef4e9;
                                        border: solid 1px #46babb;
                                        background: #46babb;
                                        background: -webkit-gradient(linear, left top, left bottom, from(#faa51a), to(#f47a20));
                                        background: -moz-linear-gradient(top, #faa51a, #f47a20);
                                        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#faa51a', endColorstr='#f47a20');
                                        display: inline-block;
                                        outline: none;
                                        cursor: pointer;
                                        text-align: center;
                                        text-decoration: none;
                                        font: 16px/100% 'Microsoft yahei',Arial, Helvetica, sans-serif;
                                        padding: .25em 0.5em .3em;
                                        text-shadow: 0 1px 1px rgba(0,0,0,.3);
                                        -webkit-border-radius: .5em;
                                        -moz-border-radius: .5em;
                                        border-radius: .5em;
                                        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
                                        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
                                        box-shadow: 0 1px 2px rgba(0,0,0,.2);
                                    }

                                        .mag:hover {
                                            background: #f47c20;
                                            background: -webkit-gradient(linear, left top, left bottom, from(#f88e11), to(#f06015));
                                            background: -moz-linear-gradient(top, #f88e11, #f06015);
                                            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f88e11', endColorstr='#f06015');
                                        }

                                        .mag:active {
                                            color: #fcd3a5;
                                            background: -webkit-gradient(linear, left top, left bottom, from(#f47a20), to(#faa51a));
                                            background: -moz-linear-gradient(top, #f47a20, #faa51a);
                                            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f47a20', endColorstr='#faa51a');
                                        }
                                </style>
                                <span class="mag" style="cursor: pointer; background:#46babb;" id="ValidCode" name="smsValidCodeText1" atr="0" onclick="send_sms(this);"> 获取验证码 </span>
                                <br>
                                <span style="color: #9f9fa0; font-size: 12px;margin-left:100px">稍后您的手机将会收到短信验证码 60s后重发</span>

                            </span>
                            &nbsp;&nbsp;
                            <span style="color: #9f9fa0; font-size: 12px;"></span>
                            <br> <br> <br>
                            <input id="btnPhone" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 9%;" type="button">
                            &nbsp;&nbsp;&nbsp;

                        </form>
                    <?php }elseif ($type == 'phone') { ?>

                    <?php }elseif ($type == 'pay') { ?>

                    <?php } ?>
                    


                </div>
            </div>

        </div>
    </div>
     
<style type="text/css">
	p{cursor:pointer}
</style>
<script type="text/javascript">
    $(document).on('click', '.save', function(){
        var type=$(this).attr('type');
        $('.save').children().css({ "background-color": "rgb(255, 255, 255)", "color": "rgb(0, 0, 51)" });
        $(this).children().css({ "background-color": "rgb(243, 151, 0)", "color": "rgb(255, 255, 255)" });
        $('.form').hide();
        $('#'+type).show();
    })
    //获取验证码
    function send_sms(obj){
        var phone = $(".str_phone").val();
        if(!phone) return;

        var reg = /^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
        if (!reg.test(phone)) return;

        $.ajax({
           type: "POST",
           url: "<?= Url::to(['student/codes'])?>",
           data: "phone="+phone,
           success: function(msg){
             if(msg == 1){
                RemainTime(obj);
                //alert('验证码已发送成功,请注意查收')       
             }else if(msg == 2){
                //alert('发送邮件失败,请重新获取验证码')      
             }else if(msg == 3){
                //alert('请输入正确的邮箱或手机号')     
             }
           }
        });
    }


    //获取密码按钮失效
    var iTime = 59;
    var Account;
    function RemainTime(obj){
        obj.disabled = true;
        
        var iSecond,sSecond="",sTime="";
        if (iTime >= 0){
            iSecond = parseInt(iTime%60);
            iMinute = parseInt(iTime/60)
            if (iSecond >= 0){
                if(iMinute>0){
                    sSecond = iMinute + "分" + iSecond + "秒";
                }else{
                    sSecond = iSecond + "秒后再次获取";
                }
            }
            sTime=sSecond;
            if(iTime==0){
                clearTimeout(Account);
                sTime='获取验证码';
                iTime = 59;
                obj.disabled = false;
            }else{
                Account = setTimeout(function(){RemainTime(obj);},1000);
                iTime=iTime-1;
            }
        }else{
            sTime='没有倒计时';
        }

        $(obj).text(sTime);
    }
    //验证验证码
    $(".phone_code").blur(function(){
        var phone = "<?= Html::encode($student['stu_phone']) ?>";
        var code = $(this).val()
        $.ajax({
               type: "POST",
               url: "<?= Url::to(['student/validationcodes'])?>",
               data: "phone="+phone+"&code="+code,
               success: function(msg){
                 if(msg==1){
                    document.getElementById('ValidCode').disabled = true;
                    $('#pcode').html('验证码不能为空');
                 }else if(msg==2){
                     document.getElementById('ValidCode').disabled = false;
                     $('#pcode').html('');
                 }else{
                    document.getElementById('ValidCode').disabled = true;
                    $('#pcode').html('验证码错误');
                 }
               }
            });
    })
</script>
