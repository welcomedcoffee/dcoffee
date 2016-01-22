<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Helps';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="t_min">
        <!--关于我们-->
        <div class="t_le t_usl" style='margin-left:-200px'>    
            <ul>
                <li class="first">新手入门</li>
                <li class="bg" atr="1" style="font-weight:bold;color:#ff8400">学生注册</li>
                <li class="bg" atr="2">企业注册</li>
                <li class="bg" atr="3">会员登录</li>
                <li class="bg" atr="4">找回密码</li>
            </ul>
            <ul>
                <li class="first" >资料完善</li>
                <li class="bg" atr="5">企业资料完善</li>
                <li class="bg" atr="6">学生资料完善</li>
            </ul>
            <ul>
                <li class="first">账户安全</li>
                <li class="bg" atr="7">修改登录密码</li>
                <li class="bg" atr="8">修改支付密码</li>
                <li class="bg" atr="9">绑定手机</li>
                <!--<li class="bg" atr="10">绑定邮箱</li>-->
            </ul>
            <ul>
                <li class="first">操作指南</li>
                <li class="bg" atr="11">发布兼职</li>
                <li class="bg" atr="12">兼职审核</li>
                <li class="bg" atr="13">兼职结算</li>
                <li class="bg" atr="14">商家兼职评论</li>
                <li class="bg" atr="15">学生兼职评论</li>
                <li class="bg" atr="16">兼职报名</li>
                <li class="bg" atr="17">交易兑付</li>
            </ul>
            <!-- <ul>
                <li class="first">常见问题</li>
                <li class="bg" atr="17">常见问题</li>
            </ul> -->
        </div>
        <div class="t_le t_usr">
            <!--学生注册-->
            <div id="stuzhuce">
            <h1>学生注册</h1>
            <p>第一步：进入趣淘学网站，点击页面右上方“注册”按钮进入注册页面。</p>
            <p >
                <img src="/public/images/Picture/zhuce1.png" width="700" height="500" />
            </p>
            <p>第二步：填写手机号、验证码、密码后点击“注册“按钮即可完成注册。</p>
            <p>
                <img src="/public/images/Picture/zhuce2.png" width="700" height="500" />
            </p>
            </div>
            <!--企业注册-->
            <div id="shopzhuce">
                <h1>企业注册</h1>
            <p>第一步：进入趣淘学网站，点击页面右上方“注册”按钮进入注册页面。</p>
            <p >
                <img src="/public/images/Picture/zhuce1.png" width="700" height="500" />
            </p>
            <p>第二步：填写手机号、公司名称、验证码、密码后点击“注册“按钮即可完成注册。</p>
            <p>
                <img src="/public/images/Picture/shopzhuce.png" width="700" height="500" />
            </p>
            </div>
            <!--会员登录-->
            <div id="login">
                <h1>会员登录</h1>
            <p>第一步：进入趣淘学网站，点击页面右上方“登录”按钮进入登录页面</p>
            <p >
                <img src="/public/images/Picture/login1.png" width="700" height="500" />
            </p>
            <p>第二步：填写手机号、密码后点击“登录“按钮即可完成登录。</p>
            <p>
                <img src="/public/images/Picture/login2.png" width="700" height="500" />
            </p>
            </div>
            <!--找回密码-->
            <div id="find">
                <h1>找回密码</h1>
            <p>第一步：进入趣淘学网站，点击页面右上方“登录”按钮进入登录页面</p>
            <p >
                <img src="/public/images/Picture/login1.png" width="700" height="500" />
            </p>
            <p>第二步：点击忘记密码按钮进入忘记密码界面。</p>
            <p>
                <img src="/public/images/Picture/find1.png" width="700" height="500" />
            </p>
            <p>第三步：填写手机号、验证码、密码后点击“提交“按钮即可完成。</p>
            <p>
                <img src="/public/images/Picture/find2.png" width="700" height="500" />
            </p>
            </div>
            <!--企业资料完善-->
            <div id="shopdetail">
                <h1>企业资料完善</h1>
            <p>第一步：登录后，点击页面右上方“我的趣淘学”按钮进入我是商户页面</p>
            <p >
                <img src="/public/images/Picture/shopindex1.png" width="700" height="500" />
            </p>
            <p>第二步：点击基本资料按钮进入基本资料界面，填写相关信息后保存。</p>
            <p>
                <img src="/public/images/Picture/shopdetail.png" width="700" height="500" />
            </p>
            </div>
            <!--学生资料完善-->
            <div id="studetail">
                <h1>学生资料完善</h1>
            <p>第一步：登录后，点击页面右上方“我的趣淘学”按钮进入我的趣淘学页面</p>
            <p >
                <img src="/public/images/Picture/shopindex1.png" width="700" height="500" />
            </p>
            <p>第二步：填写相关信息后保存。</p>
            <p>
                <img src="/public/images/Picture/studetail.png" width="700" height="500" />
            </p>
            </div>
            <!--修改登录密码-->
            <div id="updatepw">
                <h1>修改登录密码</h1>
            <p>第一步：登录后，点击页面右上方“我的趣淘学”按钮进入我的趣淘学页面</p>
            <p >
                <img src="/public/images/Picture/shopindex1.png" width="700" height="500" />
            </p>
            <p>第二步：点击“账户安全”按钮进入账户安全界面，点击修改进入密码修改界面。</p>
            <p>
                <img src="/public/images/Picture/updatepw.png" width="700" height="500" />
            </p>
            <p>第三步：填写旧密码、新密码后点击“完成“按钮即可完成。</p>
            <p>
                <img src="/public/images/Picture/updatepw2.png" width="700" height="500" />
            </p>
            </div>
            <!--修改支付密码-->
            <div id="updatepaypw">
                <h1>修改支付密码</h1>
            <p>第一步：登录后，点击页面右上方“我的趣淘学”按钮进入我的趣淘学页面</p>
            <p >
                <img src="/public/images/Picture/shopindex1.png" width="700" height="500" />
            </p>
            <p>第二步：点击“账户安全”按钮进入账户安全界面，点击修改进入支付密码修改界面。</p>
            <p>
                <img src="/public/images/Picture/updatepw.png" width="700" height="500" />
            </p>
            <p>第三步：填写手机号、验证码、密码后点击“完成“按钮即可完成。</p>
            <p>
                <img src="/public/images/Picture/updatepaypw.png" width="700" height="500" />
            </p>
            </div>
            <!--绑定手机-->
            <div id="checkphone">
                <h1>绑定手机</h1>
            <p>第一步：登录后，点击页面右上方“我的趣淘学”按钮进入我的趣淘学页面</p>
            <p >
                <img src="/public/images/Picture/shopindex1.png" width="700" height="500" />
            </p>
            <p>第二步：点击“账户安全”按钮进入账户安全界面，点击修改进入绑定手机界面。</p>
            <p>
                <img src="/public/images/Picture/updatepw.png" width="700" height="500" />
            </p>
            <p>第三步：填写手机号、验证码后点击“完成“按钮即可完成。</p>
            <p>
                <img src="/public/images/Picture/updatepaypw.png" width="700" height="500" />
            </p>
            </div>
            <!--绑定邮箱-->
            <!--发布兼职-->
            <div id="publish">
                <h1>发布兼职</h1>
            <p>第一步：登录后，点击页面右上方“我的趣淘学”按钮进入我的趣淘学页面</p>
            <p >
                <img src="/public/images/Picture/shopindex1.png" width="700" height="500" />
            </p>
            <p>第二步：填写相关信息后保存。</p>
            <p>
                <img src="/public/images/Picture/publish.png" width="700" height="500" />
            </p>
            </div>
            <!--兼职审核-->
            <div id="check">
                <h1>兼职审核</h1>
            <p>第一步：登录后，点击页面右上方“我的趣淘学”按钮进入我的趣淘学页面</p>
            <p>
                <img src="/public/images/Picture/shopindex1.png" width="700" height="500" />
            </p>
            <p>第二步：点击兼职审核。</p>
            <p>
                <img src="/public/images/Picture/parttimecheck.png" width="700" height="500" />
            </p>
            <p>第三步：点击通过。</p>
            <p>
                <img src="/public/images/Picture/parttimecheck2.png" width="700" height="500" />
            </p>
            </div>
            <!--兼职结算-->
            <div id="finishpay">
                <h1>兼职结算</h1>
            <p>第一步：登录后，点击页面右上方“我的趣淘学”按钮进入我的趣淘学页面</p>
            <p>
                <img src="/public/images/Picture/shopindex1.png" width="700" height="500" />
            </p>
            <p>第二步：点击兼职结算，并点击查看详情。</p>
            <p>
                <img src="/public/images/Picture/parttimepay1.png" width="700" height="500" />
            </p>
            <p>第三步：点击兼职结算。</p>
            <p>
                <img src="/public/images/Picture/parttimepay.png" width="700" height="500" />
            </p>
            </div>
            <!--商家兼职评论-->
            <div id="shopparttalk">
                <h1>商家兼职评论</h1>
            <p>第一步：登录后，点击页面右上方“我的趣淘学”按钮进入我的趣淘学页面</p>
            <p>
                <img src="/public/images/Picture/shopindex1.png" width="700" height="500" />
            </p>
            <p>第二步：点击我的评论，并填写内容点击“我要评论“。</p>
            <p>
                <img src="/public/images/Picture/shopparttalk.png" width="700" height="500" />
            </p>
            </div>
            <!--学生兼职评论-->
            <div id="stuparttalk">
                <h1>学生兼职评论</h1>
            <p>第一步：登录后，点击页面右上方“我的趣淘学”按钮进入我的趣淘学页面</p>
            <p>
                <img src="/public/images/Picture/shopindex1.png" width="700" height="500" />
            </p>
            <p>第二步：点击我的评论，并填写内容点击“我要评论“。</p>
            <p>
                <img src="/public/images/Picture/stuparttalk.png" width="700" height="500" />
            </p>
            </div>
            <!--兼职报名-->
            <div id="enter">
                <h1>兼职报名</h1>
            <p>第一步：登录后，点击页面上方“兼职机会”按钮进入兼职机会页面</p>
            <p>
                <img src="/public/images/Picture/enter.png" width="700" height="500" />
            </p>
            <p>第二步：点击要选择您喜爱的兼职</p>
            <p>
                <img src="/public/images/Picture/partenter.png" width="700" height="500" />
            </p>
            <p>第三步：点击要“我要报名“</p>
            </div>
            <!--交易兑付-->
            <div id="pay">
                <h1>交易兑付</h1>
            <p>第一步：登录后，点击页面上方“趣消费”按钮进入兼职机会页面</p>
            <p>
                <img src="/public/images/Picture/bettershop.png" width="700" height="500" />
            </p>
            <p>第二步：点击要选择您要进入的商家</p>
            <p>第三步：点击要选择您购买的商品</p>
            <p>第四步：填入消费总额，并输入支付密码，点击“立即支付”</p>
            <p>
                <img src="/public/images/Picture/pay.png" width="700" height="500" />
            </p>
            </div>
            <!--常见问题-->
        </div>
        <div class="clear"></div>
    </div>

<script src="/public/js/globl.js" type="text/javascript"></script>
<script type='text/javascript' src="/public/js/jsbase.js"></script>
<script type='text/javascript' src='/public/js/url.js'></script>
<script type='text/javascript' src="/public/js/datahandle.js"></script>
<script type="text/javascript" src="/public/js/jquery.tooltip.js"></script>
<script type="text/javascript" src="/public/js/pagebase.js"></script>

    <script type="text/javascript">
    $(function(){
          GLOBAL.pagebase.GetTop();
          GLOBAL.pagebase.City();
            $('#stuzhuce').show();
            $('#shopzhuce').hide();
            $('#login').hide();
            $('#find').hide();
            $('#shopdetail').hide();
            $('#studetail').hide();
            $('#updatepw').hide();
            $('#updatepaypw').hide();
            $('#checkphone').hide();
            $('#publish').hide();
            $('#check').hide();
            $('#finishpay').hide();
            $('#shopparttalk').hide();
            $('#stuparttalk').hide();
            $('#enter').hide();
            $('#pay').hide();
            
            $(".bg").click(function(){
                var t=$(this);
                $(".bg").css({"color":"#666","font-weight":"500"});
                t.css({"font-weight":"bold", "color":"#ff8400"});
                if(t.attr("atr"))
                {
                        if(t.attr("atr")==1){
                            $('#stuzhuce').show();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
                        }
                        if(t.attr("atr")==2){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').show();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==3){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').show();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==4){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').show();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==5){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').show();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==6){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').show();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==7){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').show();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==8){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').show();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==9){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').show();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==11){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').show();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==12){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').show();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==13){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').show();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==14){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').show();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==15){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').show();
                            $('#enter').hide();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==16){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').show();
                            $('#pay').hide();
            
                        }
                        if(t.attr("atr")==17){
                            $('#stuzhuce').hide();
                            $('#shopzhuce').hide();
                            $('#login').hide();
                            $('#find').hide();
                            $('#shopdetail').hide();
                            $('#studetail').hide();
                            $('#updatepw').hide();
                            $('#updatepaypw').hide();
                            $('#checkphone').hide();
                            $('#publish').hide();
                            $('#check').hide();
                            $('#finishpay').hide();
                            $('#shopparttalk').hide();
                            $('#stuparttalk').hide();
                            $('#enter').hide();
                            $('#pay').show();
            
                        }
                }
           })
    })
    </script>