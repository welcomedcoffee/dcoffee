<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Enterprisesignup';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="t_reg">
        <div class="t_regtit" id="regType">
            <ul>
                <li>
                    <a href="<?=Url::to(['site/signup'])?>">学生注册</a>
                </li>
                <li>
                    <a href="#" class="col">企业注册</a>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
        <style>
            .checkbox {float: left; padding-right: 15px;}
        </style>
        <?php
        $form = ActiveForm::begin([
        'action' => ['site/enterprisesignup'],
        'options'=>['id' => 'businessForm'],
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

                    <!-- 公司名称 -->
                    <?php echo $form->field($model, 'mer_name', ['inputOptions' => ['class' => 'in1 validate[required]', 'placeholder' => '请输入公司名称']])->textInput(['maxlength' => 10]) ?>  

                    <!-- 公司类型 -->
                   <?= $form->field($model, 'user_type', ['template' =>'<li><span class="wida"><label style="color: red;">*</label>&nbsp;&nbsp;{label}：</span><span class="shangjiangCategroy">{input}</span><font style"margin-left:15px;" color="red">{error}</font></li>'])->checkboxList(['2'=>'消费商家', '3' => '兼职商家'])?>                    
                   
                
                    
                    <!-- 获取验证码 -->      
                    <?php echo $form->field($model, 'smsValCode', ['inputOptions' => ['class' => 'in2 validate[required]', 'placeholder' => '请输入验证码'],'template'=>'<li><span class="wida"><label style="color: red;">*</label>&nbsp;&nbsp;{label}：</span><span style="padding-right:15px">{input}</span><span class="mag" style="cursor: pointer; margin-top:-1px" id="smsValidCodeText" atr="0">获取验证码</span><font color="red">{error}</font><div class="clear"></div></li>'])->textInput(['maxlength' => 4]) ?> 
                        
                    <!-- 设置密码 -->
                    <?php echo $form->field($model, 'user_password', ['inputOptions' => ['class' => 'in1 validate[required,custom[pwd]]', 'placeholder' => '请输入密码']])->passwordInput(['maxlength' => 15]) ?>     
                    
                    <!-- 确认密码 -->
                    <?php echo $form->field($model, 'user_checkpwd', ['inputOptions' => ['class' => 'in1 validate[required,custom[password]]', 'placeholder' => '请再次输入密码']])->passwordInput(['maxlength' => 15]) ?>          
                    
                    <!-- 查看协议 -->
                    <?php $model->agreement = array('1') ;?>
                    <?= $form->field($model, 'agreement', ['template' =>'<p style="float:left;"><font color="red">*</font>{input}《<a href="/protocol">淘学友注册协议</a>》<font color="red">{error}</font></p>', 'inputOptions' =>[ 'data-prompt-position' => 'centerRight:250,0']])->checkboxList(['1'=>'我已阅读并同意']) ?>                  
                    <div style='clear:left;'></div>                     
                    <li>
                        <span class="wida">&nbsp;</span>
                        <span>
                            <input type="submit"  id="studentRegBtn" value="提交注册" class="bt1 " />
                        </span>
                        <div class="clear"></div>
                    </li>
                </ul>
            </div>
            <!--  <div class="t_regify">
                <span>已有账户：</span>
                <span>
                    <a href="#">登陆</a>
                </span>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;其他网站绑定登录：</span>
                <span class="qq">
                    <a href="#"></a>
                </span>
                <span class="sina">
                    <a href="#"></a>
                </span>
                <span class="wx">
                    <a href="#"></a>
                </span>
                <span class="zfb">
                    <a href="#"></a>
                </span>
            </div>-->
        <?php ActiveForm::end(); ?>  
    </div>
    <!-- 图片验证码 -->
 <div class="verificationTip" id="verificationTipID" atr="0" style="display:none" >
     <h1>请输入图片验证码</h1>
      <form action="" method="get" >
        <div class="verificationImg">
          <input type="text" placeholder="不区分大小写" id="imgCode1"> 
          <img src="/toRegistVerfyCode" id="imgverCode1" alt="验证码">
          </div>
          <div class="verificationBut">
            <button type="button" class="confirmBut but verificationButWidth butBlue" id="registerverificationBut">确认</button>
            <button type="button" class="cancelBut but verificationButWidth" id="btnCodeEsc" >取消</button>   
          </div>
      </form>
 </div>
