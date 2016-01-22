<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="t_land">
    <div class="t_landi">
        <h1>账号登录</h1>
        
        <form id="loginForm">
            <ul>
                <li>
                    <span class="wida">账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：</span>
                    <span>
                        <input name="phone" id="phone" type="text" class="in1 validate[required,custom[logname]] "  placeholder="请输入手机号"/>
                    </span>
                    <div class="clear"></div>
                    
                </li>
                <li>
                    <span class="wida">登录密码：</span>
                    <span>
                        <input name="password" id="password" type="password" class="in1 validate[required]" placeholder="请输入密码"/>
                    </span>
                    <div class="clear"></div>
                </li>
                <li>
                    <input type="button" id="loginBtn" class="bt1" value="登  录"  />
                </li>
                <li style="height: 40px;">
                    <span>
                        <a href="/main/findPasswd">忘记密码</a>
                    </span>
                    <b><a href="/main/regUser">快速注册</a></b>
                    <div class="clear"></div>
                </li>
        
            </ul>
        </form>
        <div class="clear"></div>
    </div>
</div>