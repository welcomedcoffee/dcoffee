<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
     //支付宝配置
	'alipay'=> [
       'alipay_config'=>[
           'partner'       =>'2088002075883504',//必填
           'key'           =>'y8z1t3vey08bgkzlw78u9cbc4pizy2sj',//必填
           'sign_type'     => strtoupper('MD5'),//必填
           'input_charset' => strtolower('utf-8'),//必填
           'cacert'        => getcwd().'\\cacert.pem',//必填且CA证书文件能有效访问，否则会有sign错误
           'transport'     =>'http',//如果你的服务器支持https请填写https
       ],
       'alipay'   =>[
           'seller_email'  =>'li1209@126.com',//必填
           'notify_url'    =>'http://finance.coffeedou.com/index.php?r=alipay/notify-url',
           'return_url'    =>'http://finance.coffeedou.com/index.php?r=alipay/return-url',//必填
           'successpage'   =>'account/list',//处理成功后的页面
           'errorpage'     =>'shopcart/list',//处理失败的页面
       ],
    ],
];
