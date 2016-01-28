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
                        <a href="javascript:void(0)" class="save" type="pwd">
                            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 51);" id="a1">
                                <b>修改登录密码</b>
                            </li>
                        </a>
                        <a href="javascript:void(0)" class="save" type="pay">
                            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 51);" id="a2">
                                <b>修改支付密码</b>
                            </li>
                        </a>
                        <a href="javascript:void(0)" class="save" type="phone">
                            <li style="background-color: rgb(243, 151, 0); color: rgb(255, 255, 255);" id="a3">
                                <b>手机验证</b>
                            </li>
                        </a>
                    <?php }elseif ($type == 'pay') { ?>
                        <a href="javascript:void(0)" class="save" type="pwd">
                            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 51);" id="a1">
                                <b>修改登录密码</b>
                            </li>
                        </a>
                        <a href="javascript:void(0)" class="save" type="pay">
                            <li style="background-color: rgb(243, 151, 0); color: rgb(255, 255, 255);" id="a2">
                                <b>修改支付密码</b>
                            </li>
                        </a>
                        <a href="javascript:void(0)" class="save" type="phone">
                            <li style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 51);" id="a3">
                                <b>手机验证</b>
                            </li>
                        </a>
                    <?php } ?>
                        
                        

                    </ul>
                </div>

                <div id="register">
                    <?php if($type == 'pwd') { ?>
                        <!-- 修改用户密码 -->
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['student/pwd']),
                            'method'=>'post',
                            'options' => ['enctype' => 'multipart/form-data',
                                            'id' => 'pwd',
                                            'class' => 'form'
                                        ],
                        ])?>
                        <input type="hidden" name="stu_id" value="<?= Html::encode($student['stu_id']) ?>">
                        <input type="hidden" name="type" value="pwd">
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;输入旧密码&nbsp;:
                                <input id="oldpassword" class="in1" placeholder="请输入旧密码" style="height:25px" type="password" name="oldpassword">
                                <span id="o_pwd"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">长度六位以上的数字和字母结合</span>
                            <br> <br> 
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;设置新密码&nbsp;:
                                <input id="password" class="in1" name="password" placeholder="请输入新密码" style="height:25px" type="password">
                                <span id="s_pwd"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">不想更换请留空</span>
                            <br> <br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;重复新密码&nbsp;:
                                
                                <input name="ispassword" id="ispassword" class="in1" placeholder="请输入确认密码" style="height:25px" type="password">
                                <span id="s_pwds"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">再次输入与上面相同的密码</span>
                            <br> <br> 
                            <input id="button" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 15%;" type="submit">
                        <?php $form = ActiveForm::end()?>

                        <!-- 修改手机号码 -->
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['student/pwd']),
                            'method'=>'post',
                            'options' => ['enctype' => 'multipart/form-data',
                                            'id' => 'phone',
                                            'class' => 'form',
                                            'style' => 'display: none'
                                        ],
                        ])?>
                        <input type="hidden" id="phone_id" name="stu_id" value="<?= Html::encode($student['stu_id']) ?>">
                        <input type="hidden" name="type" value="phone">
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;您的手机号码&nbsp;&nbsp;:&nbsp;
                                <input name="phone" id="phones" class="in1" placeholder="请输入手机号码" style="height:25px" type="text" >
                                <span id="s_phone"></span>
                            </span>
                            <br> <br>
                            <span style="font-size: 12px;margin-left:20px">
                                <span style="color: #da1f29">*</span>
                                &nbsp;<span>短信验证码</span>:&nbsp;
                                <input name="code" id="phone_code" class="in2 phone_code" placeholder="您的手机短信验证码" style="height:25px;width: 200px;" type="text">
                                <span id="pcode"></span>
                                 <input id="p_button" value="获取验证码" style="cursor: pointer; background:#46babb;width: 130px;" class="mag" type="button" onclick="send_sms(this);" t_type='phones'>
                                <br>
                                <span style="color: #9f9fa0; font-size: 12px;margin-left:100px">稍后您的手机将会收到短信验证码 60s后重发</span>

                            </span>
                            &nbsp;&nbsp;
                            <span style="color: #9f9fa0; font-size: 12px;"></span>
                            <br> <br> <br>
                            <input id="p_button" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 9%;" type="submit">
                            &nbsp;&nbsp;&nbsp;
                        <?php $form = ActiveForm::end()?>

                        <!-- 修改支付密码 -->
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['student/pwd']),
                            'method'=>'post',
                            'options' => ['enctype' => 'multipart/form-data',
                                            'id' => 'pay',
                                            'class' => 'form',
                                            'style' => 'display: none'
                                        ],
                        ])?>
                        <input type="hidden" id="id" name="stu_id" value="<?= Html::encode($student['stu_id']) ?>">
                        <input type="hidden" name="type" value="pay">
                            <span style="font-size: 12px;margin-left:5px">
                                <span style="color: #da1f29">*</span>
                                <span style="display:inline-block;">您的手机号码</span>&nbsp;:
                                <input name="str_phone" id="str_phone" class="in1" placeholder="请输入手机号码" style="height:25px" type="text" value="<?= Html::encode($student['stu_phone']) ?>">
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">&nbsp;稍后您的手机将会收到短信验证码 60s后重发</span>
                            <br><br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;短信验证码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="code" id="code"  class="in2 phone_code" placeholder="您的手机短信验证码" style="height:25px;width: 200px;" type="text">
                             <input id="p_button" value="获取验证码" style="cursor: pointer; background:#46babb;width: 130px;" class="mag" type="button" onclick="send_sms(this);" t_type='str_phone'>
                            <span style="color: #9f9fa0; font-size: 12px;"></span>
                            <br> <br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;设置新密码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="paypassword" id="paypassword" class="in1 pwd" placeholder="请输入新密码" style="height:25px" type="password">
                                <span id="ppwds"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">长度为六位以上的数字和字母的组合</span>
                            <br><br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;重复新密码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="ispaypassword" id="ispaypassword" class="in1 pwd" placeholder="请输入确认密码" style="height:25px" type="password">
                                <span id="pwds"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">您再次输入与上面相同的密码</span>
                            <br> <br> <br>
                            <input id="paybutton" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 12%;" type="submit">
                        <?php $form = ActiveForm::end()?>
                    <?php }elseif ($type == 'phone') { ?>
                        <!-- 修改用户密码 -->
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['student/pwd']),
                            'method'=>'post',
                            'options' => ['enctype' => 'multipart/form-data',
                                            'id' => 'pwd',
                                            'class' => 'form',
                                            'style' => 'display: none'
                                        ],
                        ])?>
                        <input type="hidden" name="stu_id" value="<?= Html::encode($student['stu_id']) ?>">
                        <input type="hidden" name="type" value="pwd">
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;输入旧密码&nbsp;:
                                <input id="oldpassword" class="in1" placeholder="请输入旧密码" style="height:25px" type="password" name="oldpassword">
                                <span id="o_pwd"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">长度六位以上的数字和字母结合</span>
                            <br> <br> 
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;设置新密码&nbsp;:
                                <input id="password" class="in1" name="password" placeholder="请输入新密码" style="height:25px" type="password">
                                <span id="s_pwd"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">不想更换请留空</span>
                            <br> <br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;重复新密码&nbsp;:
                                
                                <input name="ispassword" id="ispassword" class="in1" placeholder="请输入确认密码" style="height:25px" type="password">
                                <span id="s_pwds"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">再次输入与上面相同的密码</span>
                            <br> <br> 
                            <input id="button" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 15%;" type="submit">
                        <?php $form = ActiveForm::end()?>

                        <!-- 修改手机号码 -->
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['student/pwd']),
                            'method'=>'post',
                            'options' => ['enctype' => 'multipart/form-data',
                                            'id' => 'phone',
                                            'class' => 'form',
                                            
                                        ],
                        ])?>
                        <input type="hidden" id="phone_id" name="stu_id" value="<?= Html::encode($student['stu_id']) ?>">
                        <input type="hidden" name="type" value="phone">
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;您的手机号码&nbsp;&nbsp;:&nbsp;
                                <input name="phone" id="phones" class="in1" placeholder="请输入手机号码" style="height:25px" type="text" >
                                <span id="s_phone"></span>
                            </span>
                            <br> <br>
                            <span style="font-size: 12px;margin-left:20px">
                                <span style="color: #da1f29">*</span>
                                &nbsp;<span>短信验证码</span>:&nbsp;
                                <input name="code" id="phone_code" class="in2 phone_code" placeholder="您的手机短信验证码" style="height:25px;width: 200px;" type="text">
                                <span id="pcode"></span>
                                 <input id="p_button" value="获取验证码" style="cursor: pointer; background:#46babb;width: 130px;" class="mag" type="button" onclick="send_sms(this);" t_type='phones'>
                                <br>
                                <span style="color: #9f9fa0; font-size: 12px;margin-left:100px">稍后您的手机将会收到短信验证码 60s后重发</span>

                            </span>
                            &nbsp;&nbsp;
                            <span style="color: #9f9fa0; font-size: 12px;"></span>
                            <br> <br> <br>
                            <input id="p_button" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 9%;" type="submit">
                            &nbsp;&nbsp;&nbsp;
                        <?php $form = ActiveForm::end()?>

                        <!-- 修改支付密码 -->
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['student/pwd']),
                            'method'=>'post',
                            'options' => ['enctype' => 'multipart/form-data',
                                            'id' => 'pay',
                                            'class' => 'form',
                                            'style' => 'display: none'
                                        ],
                        ])?>
                        <input type="hidden" id="id" name="stu_id" value="<?= Html::encode($student['stu_id']) ?>">
                        <input type="hidden" name="type" value="pay">
                            <span style="font-size: 12px;margin-left:5px">
                                <span style="color: #da1f29">*</span>
                                <span style="display:inline-block;">您的手机号码</span>&nbsp;:
                                <input name="str_phone" id="str_phone" class="in1" placeholder="请输入手机号码" style="height:25px" type="text" value="<?= Html::encode($student['stu_phone']) ?>">
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">&nbsp;稍后您的手机将会收到短信验证码 60s后重发</span>
                            <br><br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;短信验证码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="code" id="code"  class="in2 phone_code" placeholder="您的手机短信验证码" style="height:25px;width: 200px;" type="text">
                             <input id="p_button" value="获取验证码" style="cursor: pointer; background:#46babb;width: 130px;" class="mag" type="button" onclick="send_sms(this);" t_type='str_phone'>
                            <span style="color: #9f9fa0; font-size: 12px;"></span>
                            <br> <br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;设置新密码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="paypassword" id="paypassword" class="in1 pwd" placeholder="请输入新密码" style="height:25px" type="password">
                                <span id="ppwds"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">长度为六位以上的数字和字母的组合</span>
                            <br><br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;重复新密码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="ispaypassword" id="ispaypassword" class="in1 pwd" placeholder="请输入确认密码" style="height:25px" type="password">
                                <span id="pwds"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">您再次输入与上面相同的密码</span>
                            <br> <br> <br>
                            <input id="paybutton" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 12%;" type="submit">
                        <?php $form = ActiveForm::end()?>
                    <?php }elseif ($type == 'pay') { ?>
                        <!-- 修改用户密码 -->
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['student/pwd']),
                            'method'=>'post',
                            'options' => ['enctype' => 'multipart/form-data',
                                            'id' => 'pwd',
                                            'class' => 'form',
                                            'style' => 'display: none',
                                        ],
                        ])?>
                        <input type="hidden" name="stu_id" value="<?= Html::encode($student['stu_id']) ?>">
                        <input type="hidden" name="type" value="pwd">
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;输入旧密码&nbsp;:
                                <input id="oldpassword" class="in1" placeholder="请输入旧密码" style="height:25px" type="password" name="oldpassword">
                                <span id="o_pwd"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">长度六位以上的数字和字母结合</span>
                            <br> <br> 
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;设置新密码&nbsp;:
                                <input id="password" class="in1" name="password" placeholder="请输入新密码" style="height:25px" type="password">
                                <span id="s_pwd"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">不想更换请留空</span>
                            <br> <br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;重复新密码&nbsp;:
                                
                                <input name="ispassword" id="ispassword" class="in1" placeholder="请输入确认密码" style="height:25px" type="password">
                                <span id="s_pwds"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:80px">再次输入与上面相同的密码</span>
                            <br> <br> 
                            <input id="button" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 15%;" type="submit">
                        <?php $form = ActiveForm::end()?>

                        <!-- 修改手机号码 -->
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['student/pwd']),
                            'method'=>'post',
                            'options' => ['enctype' => 'multipart/form-data',
                                            'id' => 'phone',
                                            'class' => 'form',
                                            'style' => 'display: none'
                                        ],
                        ])?>
                        <input type="hidden" id="phone_id" name="stu_id" value="<?= Html::encode($student['stu_id']) ?>">
                        <input type="hidden" name="type" value="phone">
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;您的手机号码&nbsp;&nbsp;:&nbsp;
                                <input name="phone" id="phones" class="in1" placeholder="请输入手机号码" style="height:25px" type="text" >
                                <span id="s_phone"></span>
                            </span>
                            <br> <br>
                            <span style="font-size: 12px;margin-left:20px">
                                <span style="color: #da1f29">*</span>
                                &nbsp;<span>短信验证码</span>:&nbsp;
                                <input name="code" id="phone_code" class="in2 phone_code" placeholder="您的手机短信验证码" style="height:25px;width: 200px;" type="text">
                                <span id="pcode"></span>
                                 <input id="p_button" value="获取验证码" style="cursor: pointer; background:#46babb;width: 130px;" class="mag" type="button" onclick="send_sms(this);" t_type='phones'>
                                <br>
                                <span style="color: #9f9fa0; font-size: 12px;margin-left:100px">稍后您的手机将会收到短信验证码 60s后重发</span>

                            </span>
                            &nbsp;&nbsp;
                            <span style="color: #9f9fa0; font-size: 12px;"></span>
                            <br> <br> <br>
                            <input id="p_button" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 9%;" type="submit">
                            &nbsp;&nbsp;&nbsp;
                        <?php $form = ActiveForm::end()?>

                        <!-- 修改支付密码 -->
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['student/pwd']),
                            'method'=>'post',
                            'options' => ['enctype' => 'multipart/form-data',
                                            'id' => 'pay',
                                            'class' => 'form',
                                        ],
                        ])?>
                        <input type="hidden" id="id" name="stu_id" value="<?= Html::encode($student['stu_id']) ?>">
                        <input type="hidden" name="type" value="pay">
                            <span style="font-size: 12px;margin-left:5px">
                                <span style="color: #da1f29">*</span>
                                <span style="display:inline-block;">您的手机号码</span>&nbsp;:
                                <input name="str_phone" id="str_phone" class="in1" placeholder="请输入手机号码" style="height:25px" type="text" value="<?= Html::encode($student['stu_phone']) ?>">
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">&nbsp;稍后您的手机将会收到短信验证码 60s后重发</span>
                            <br><br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;短信验证码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="code" id="code"  class="in2 phone_code" placeholder="您的手机短信验证码" style="height:25px;width: 200px;" type="text">
                             <input id="p_button" value="获取验证码" style="cursor: pointer; background:#46babb;width: 130px;" class="mag" type="button" onclick="send_sms(this);" t_type='str_phone'>
                            <span style="color: #9f9fa0; font-size: 12px;"></span>
                            <br> <br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;设置新密码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="paypassword" id="paypassword" class="in1 pwd" placeholder="请输入新密码" style="height:25px" type="password">
                                <span id="ppwds"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">长度为六位以上的数字和字母的组合</span>
                            <br><br>
                            <span style="font-size: 12px;">
                                <span style="color: #da1f29">*</span>
                                &nbsp;重复新密码&nbsp;&nbsp;&nbsp;:&nbsp;
                                <input name="ispaypassword" id="ispaypassword" class="in1 pwd" placeholder="请输入确认密码" style="height:25px" type="password">
                                <span id="pwds"></span>
                            </span>
                            <br>
                            <span style="color: #9f9fa0; font-size: 12px;margin-left:90px">您再次输入与上面相同的密码</span>
                            <br> <br> <br>
                            <input id="paybutton" value="完成" style="width: 100px; height: 30px; background: #f39700; color: white; margin-left: 12%;" type="submit">
                        <?php $form = ActiveForm::end()?>
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
        var type = $(obj).attr('t_type')
        var phone = $("#"+type).val();
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
             }else if(msg == 3){
                alert('请输入正确手机号')     
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

        $(obj).val(sTime);
    }
    //验证手机号码
    $(document).on('blur', '#phones', function(){
        var phone = $(this).val();
        var reg = /^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
        if (!reg.test(phone)){
            $("#s_phone").html('手机号格式不正确')
            $('#p_button').attr('disabled','disabled');
        }else{
            $.ajax({
               type: "POST",
               url: "<?= Url::to(['student/userphone'])?>",
               data: "phone="+phone,
               success: function(msg){
                 if (msg == 2) {
                    $("#s_phone").html('手机号可以使用')
                    $('#p_button').attr('disabled',false);
                 }else if(msg == 1){
                    $("#s_phone").html('手机号已被使用')
                    $('#p_button').attr('disabled','disabled');
                 }
               }
            });
        }
    })
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
                    //document.getElementById('ValidCode').disabled = true;
                    $('#pcode').html('验证码不能为空');
                 }else if(msg==2){
                     //document.getElementById('ValidCode').disabled = false;
                     $('#pcode').html('');
                 }else{
                    //document.getElementById('ValidCode').disabled = true;
                    $('#pcode').html('验证码错误');
                 }
               }
            });
    })
    
    //验证密码
    $("#paypassword").blur(function(){
        var ispaypassword = $("#ispaypassword").val()
        var paypassword = $(this).val()
        var reg = /^\w{5,17}$/;
        if (!reg.test(paypassword)){
             $('#paybutton').attr('disabled','disabled');
            $('#ppwds').html('密码必须是6-18位');
        }else{
            if (paypassword != ispaypassword) {
                $('#paybutton').attr('disabled','disabled');
                $("#ppwds").html('密码与确认密码不一致请重新输入')
            }else{
               $('#paybutton').attr('disabled',false)
               $("#ppwds").html('')
               $("#pwds").html('')
            }
        }
    })
    //验证密码
     $("#ispaypassword").blur(function(){
        var paypassword = $("#paypassword").val()
        var ispaypassword = $(this).val()
        var reg = /^\w{5,17}$/;
        if (!reg.test(ispaypassword)){
             $('#paybutton').attr('disabled','disabled');
            $('#pwds').html('密码必须是6-18位');
        }else{
            if (paypassword != ispaypassword) {
                $('#paybutton').attr('disabled','disabled');
                $("#pwds").html('密码与确认密码不一致请重新输入')
            }else{
               $('#paybutton').attr('disabled',false)
               $("#pwds").html('')
               $("#ppwds").html('')
            }
        } 
    })
    //查询旧密码是否真确
    $("#oldpassword").blur(function(){
        var id = $('#id').val();
        var oldpassword = $(this).val()
        $.ajax({
           type: "POST",
           url: "<?= Url::to(['student/userpwd'])?>",
           data: "id="+id+"&password="+oldpassword,
           success: function(msg){
               if (msg == 1) {
                    $('#button').attr('disabled',false);
                    $('#o_pwd').html('');
               }else if(msg == 2){
                    $('#button').attr('disabled','disabled');
                    $('#o_pwd').html('旧密码错误');
               }
           }
        });
    })
    //验证用户密码
    $("#password").blur(function(){
        var ispassword = $("#ispassword").val()
        var password = $(this).val()
        var reg = /^\w{5,17}$/;
        if (!reg.test(password)){
            $('#button').attr('disabled','disabled');
            $('#s_pwd').html('密码必须是6-18位');
        }else{
            if (password != ispassword) {
                $('#button').attr('disabled','disabled');
                $("#s_pwd").html('密码与确认密码不一致请重新输入')
            }else{
               $('#button').attr('disabled',false)
               $("#s_pwd").html('')
               $("#s_pwds").html('')
            }
        }
    })
    //验证用户密码
     $("#ispassword").blur(function(){
        var password = $("#password").val()
        var ispassword = $(this).val()
        var reg = /^\w{5,17}$/;
        if (!reg.test(ispassword)){
             $('#button').attr('disabled','disabled');
            $('#s_pwds').html('密码必须是6-18位');
        }else{
            if (password != ispassword) {
                $('#button').attr('disabled','disabled');
                $("#s_pwds").html('密码与确认密码不一致请重新输入')
            }else{
               $('#button').attr('disabled',false)
               $("#s_pwds").html('')
               $("#s_pwd").html('')
            }
        } 
    })
</script>
