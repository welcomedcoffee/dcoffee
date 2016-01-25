<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    #user-agreement {float: left;}
</style>   
<div class="t_reg">
    <div class="t_regtit" id="regType">
        <ul>
            <li>
                <a href="#" class="col">学生注册</a>
            </li>
            <li>
                <a href="<?=Url::to(['site/enterprisesignup'])?>">企业注册</a>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
    <style> 
        .help-block help-block-error{display:inline;}
    </style>
    <?php
    $form = ActiveForm::begin([
    'action' => ['site/signup'],
    'options'=>['id' => 'studentRegForm'],
    'method'=>'post',
    'fieldConfig' => [
            'template' => '<li><span class="wida"><label style="color: red;">*</label>&nbsp;&nbsp;{label}：</span><span style="padding-right:15px">{input}</span><font color="red">{error}</font><div class="clear"></div></li>'
        ]    
    ]); 
    ?>    

        <!--注册信息-->
        <div class="t_regif">
            <ul>
                <!-- 用户手机 -->
                <?php echo $form->field($model, 'user_phone', ['inputOptions' => ['class' => 'in1 validate[required,custom[mobile]]', 'placeholder' => '请输入手机号码']])->textInput(['maxlength' => 11]) ?>  
                <li>
                <!-- 获取验证码 -->		
                <?php echo $form->field($model, 'smsValCode', ['inputOptions' => ['class' => 'in2 validate[required]', 'placeholder' => '请输入验证码'],'template'=>'<span class="wida"><label style="color: red;">*</label>&nbsp;&nbsp;{label}：</span><span style="padding-right:15px">{input}</span><span class="mag" style="cursor: pointer; margin-top:-1px" id="smsValidCodeText" atr="0">获取验证码</span><font color="red">{error}</font><div class="clear"></div> '])->textInput(['maxlength' => 4]) ?>  			 
                </li>
                
                <!-- 设置密码 -->
                <?php echo $form->field($model, 'user_password', ['inputOptions' => ['class' => 'in1 validate[required,custom[pwd]]', 'placeholder' => '请输入密码']])->passwordInput(['maxlength' => 15]) ?>                     
                					
                <!-- 确认密码 -->
                <?php echo $form->field($model, 'user_checkpwd', ['inputOptions' => ['class' => 'in1 validate[required,custom[password]]', 'placeholder' => '请再次输入密码']])->passwordInput(['maxlength' => 15]) ?>          
                    <div class="clear"></div>
                        
                <!-- 查看协议 -->
                <?= $form->field($model, 'agreement', ['template' =>'<p style="float:left;"><font color="red">*</font>{input}《<a href="/protocol">趣淘学注册协议</a>》<font color="red">{error}</font></p>', 'inputOptions' =>[ 'data-prompt-position' => 'centerRight:250,0']])->checkboxList(['0'=>'我已阅读并同意']) ?> 
                
                <div style='clear:left;'></div> 
                <!-- <p>
                    <?=Html::checkbox('agreement',true,['id' => 'agreement', 'data-prompt-position' => 'centerRight:250,0', 'class' => 'validate[required]'])?>
                    我已阅读并同意《
                    
                    》
                </p>  -->

                <li>
                    <span class="wida">&nbsp;</span>
					<span>                      
						<input type="submit" id="studentRegBtn" value="下一步" class="bt1" />
					</span>
                    <div class="clear"></div>
                </li>
            </ul>
        </div>
    <?php ActiveForm::end(); ?>    
</div>



        <div class="alert alert-danger" role="alert">
            <?= Yii::$app->session->getFlash('success') ?>
            <?= Yii::$app->session->getFlash('error') ?>
        </div>

<!-- 图片验证码 -->
<div class="verificationTip" id="verificationTipID" atr="0" style="display:none" >
    <h1>请输入图片验证码</h1>
    <form action="" method="get" >
        <div class="verificationImg">
            <input type="text" placeholder="不区分大小写" id="imgCode1">
            <img src="Picture/3b167b624caf4eb080967f115b416e28.gif" id="imgverCode1" alt="验证码">
        </div>
        <div class="verificationBut">
            <button type="button" class="confirmBut but verificationButWidth butBlue" id="registerverificationBut">确认</button>
            <button type="button" class="cancelBut but verificationButWidth" id="btnCodeEsc">取消</button>
        </div>
   
</div>
