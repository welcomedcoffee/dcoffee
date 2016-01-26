<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .help-block help-block-error {color: red;}
</style>
<div class="t_land">
    <div class="t_landi">
        <h1>账号登录</h1>
        <?php
            $form = ActiveForm::begin([
            'action' => ['site/login'],
            'options'=>['id' => 'loginForm'],
            'method'=>'post',
            'fieldConfig' => [
                    'template' => '<li><span class="wida">{label}：</span><span>{input}</span><div class="clear"></div><font color="red">{error}</font></li>'
                ]    
            ]); 
        ?>    
       
            <ul>
                <!-- 用户手机账号 -->
                <?php echo $form->field($model, 'user_phone', ['inputOptions' => ['class' => 'in1 validate[required,custom[logname]]', 'placeholder' => '请输入手机号']])->textInput(['maxlength' => 11]) ?>

                <!-- 输入密码 -->
                <?php echo $form->field($model, 'user_password', ['inputOptions' => ['class' => 'in1 validate[required]', 'placeholder' => '请输入密码']])->passwordInput(['maxlength' => 15]) ?>                
                <li>
                    <input type="submit" id="loginBtn" class="bt1" value="登  录"  />
                </li>
                <li style="height: 40px;">
                    <span>
                        <a href="/main/findPasswd">忘记密码</a>
                    </span>
                    <b><a href="/main/regUser">快速注册</a></b>
                    <div class="clear"></div>
                </li>
        
            </ul>
        <?php ActiveForm::end(); ?>
        <div class="clear"></div>
    </div>
</div>