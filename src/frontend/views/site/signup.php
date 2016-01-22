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
<!--<div class="site-signup">
    <h1><?/*= Html::encode($this->title) */?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php /*$form = ActiveForm::begin(['id' => 'form-signup']); */?>

                <?/*= $form->field($model, 'username') */?>

                <?/*= $form->field($model, 'email') */?>

                <?/*= $form->field($model, 'password')->passwordInput() */?>

                <div class="form-group">
                    <?/*= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) */?>
                </div>

            <?php /*ActiveForm::end(); */?>
        </div>
    </div>
</div>-->



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
    <form id="studentRegForm">

        <!--注册信息-->
        <div class="t_regif">
            <ul>
                <li>
					<span class="wida">
						<label style="color: red;">*</label>
						&nbsp;&nbsp;手机号码：
					</span>
					<span>
						<input name="phone" id="phone" type="text" class="in1 validate[required,custom[mobile]] " placeholder="请输入手机号码"/>
					</span>
                    <div class="clear"></div>

                </li>
                <li>
					<span class="wida">
						<label style="color: red;">*</label>&nbsp;&nbsp;短信验证码：
					</span>
					<span>
						<input name="smsValidCode"  id="smsValidCode" type="hidden" value=""/>
						<input   name="smsValCode"   id="smsValCode" type="text" data-prompt-position="centerRight:125,0"
                                 class="in2 validate[required] "  placeholder="请输入验证码"/>
					</span>
					<!-- <span class="mag" style="cursor: pointer;" id="smsValidCodeText" atr="0">
                        获取验证码
                    </span> -->
                    <div class="clear"></div>
                </li>

                <li>
					<span class="wida">
						<label style="color: red;">*</label>
						&nbsp;&nbsp;设置密码：
					</span>
					<span>
						<input name="password" id="password" type="password" class="in1 validate[required,custom[pwd]]"  placeholder="请输入密码"/>
					</span>
                    <div class="clear"></div>
                </li>
                <li>
					<span class="wida">
						<label style="color: red;">*</label>
						&nbsp;&nbsp;确认密码：
					</span>
					<span>
						<input name="isPassword" id="isPassword" type="password" class="in1 validate[condRequired[password],equals[password]]"  placeholder="请输入确认密码"/>
					</span>
                    <div class="clear"></div>
                </li>
                <p>
                    <input id="agreement" name="agreement" data-prompt-position="centerRight:250,0" type="checkbox" checked="checked"
                           class="validate[required]" />
                    我已阅读并同意《
                    <a href="/protocol">趣淘学注册协议</a>
                    》
                </p>
                <li>
                    <span class="wida">&nbsp;</span>
					<span>
						<input type="button" name="button" id="studentRegBtn" value="下一步" class="bt1 " />
					</span>
                    <div class="clear"></div>
                </li>
            </ul>
        </div>

    </form>
</div>
<!--  注册学生成功弹窗

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
    </form>
</div>
