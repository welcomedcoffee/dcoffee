<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '咖啡豆项目管理后台';

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link href="css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.form-label{
    text-align: right;
    padding-right: 40px;
    padding-left: 100px;
}
#verify{
    width: 200px;
}
#imgcode{
    float: left;
    padding-right: 10px;
}
#verify-div{
    margin-left: 30%;
    width: 100%;
}
.input-text {
    width: 200px;
}
</style>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    
    <!--表单开始-->
    <?php $form = ActiveForm::begin(['class' => 'form form-horizontal']); ?>

        <!--账号-->
        <?= $form->field($model, 'username', 
        [
            'inputOptions' => ['placeholder'=>'请输入用户名', 'class' => 'input-text size-L'],
            'template' => '<div class="row cl"><label class="form-label col-3"><i class="Hui-iconfont">&#xe60d;</i></label><div class="formControls col-8">{input}{error}</div></div>',
        ])->textInput() 
        ?>
        
        <!--密码-->

        <?= $form->field($model, 'password',
        [
            'inputOptions' => ['placeholder'=>'请输入密码', 'class' => 'input-text size-L'],
            'template' => '<div class="row cl"><label class="form-label col-3"><i class="Hui-iconfont">&#xe60e;</i></label><div class="formControls col-8">{input}{error}</div></div>',
        ])->passwordInput() ?>

        <!--验证码-->

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(),[
           'template' => '<div class="row cl"><div class="formControls col-8 col-offset-3" id="verify-div">{image}<span id="imgcode">{input}</span></div></div>',
           'imageOptions' => ['alt' => '验证码'],
           'captchaAction' => 'login/captcha',
           'options' =>['placeholder' => '请输入验证码', 'class' => 'input-text size-L', 'id' => 'verify'],
        ]);?>
        
        <!--登陆-->      
        <div class="row">
            <div class="formControls col-8 col-offset-3">
                <?= Html::submitButton('登陆', ['class' => 'btn btn-success radius size-L']) ?>
                <?= Html::resetButton('重置', ['class' => 'btn btn-default radius size-L']) ?>
                    
            </div>
        </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
<div class="footer">北京高阳明天科技</div>

</body>
</html>