<?php
namespace frontend\controllers;
header("Content-type:text/html;charset=utf-8");
use Yii;
use yii\web\Controller;
use backend\models\student\PayOrder;
use backend\models\student\Students;
use backend\models\student\Payment;
/**
 * 支付宝支付
 */
class AlipayController extends Controller{
    public $enableCsrfValidation = false;
	public function actionIndex()
	{

		//header("Content-type:text/html;charset=utf-8");
        require_once('../../vendor/alipay/lib/alipay_core.function.php');
        require_once('../../vendor/alipay/lib/alipay_md5.function.php');
        require_once('../../vendor/alipay/lib/alipay_notify.class.php');
        require_once('../../vendor/alipay/lib/alipay_submit.class.php');

        $alipay_config = Yii::$app->params['alipay']['alipay_config'];

        $order_id = YII::$app->request->get('order_id');
        $order = PayOrder::findone($order_id);
        /**************************请求参数**************************/

        //支付类型
        $payment_type = "1";
        //必填，不能修改
        //服务器异步通知页面路径
        $notify_url   = Yii::$app->params['alipay']['alipay']['notify_url'];
        //需http://格式的完整路径，不能加?id=123这类自定义参数

        //页面跳转同步通知页面路径
        $return_url   = Yii::$app->params['alipay']['alipay']['return_url'];
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

        //卖家支付宝帐户
        $seller_email = Yii::$app->params['alipay']['alipay']['seller_email'];
        //必填

        //商户订单号
        //$out_trade_no = $_POST['WIDout_trade_no'];
		$out_trade_no = $order->order_sn;
		//商户网站订单系统中唯一订单号，必填

		//订单名称
		//$subject    = $_POST['WIDsubject'];
		$subject ="充值金币";
		//必填

		//付款金额
		//$total_fee  = $_POST['WIDtotal_fee'];
		$total_fee    = $order->order_price;
		//必填

        //订单描述

        $body = '充值金币';
        //商品展示地址
        $show_url = 'http://finance.coffeedou.com';
        //需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html

        //防钓鱼时间戳
		$anti_phishing_key = "";
		//若要使用请调用类文件submit中的query_timestamp函数

		//客户端的IP地址
		$exter_invoke_ip   = "";
        //非局域网的外网IP地址，如：221.0.0.1


	/************************************************************/

		//构造要请求的参数数组，无需改动
		$parameter = array(
				"service"           => "create_direct_pay_by_user",
				"partner"           => trim($alipay_config['partner']),
				"payment_type"      => $payment_type,
				"notify_url"        => $notify_url,
				"return_url"        => $return_url,
				"seller_email"      => $seller_email,
				"out_trade_no"      => $out_trade_no,
				"subject"           => $subject,
				"total_fee"         => $total_fee,
				"body"              => $body,
				"show_url"          => $show_url,
				"anti_phishing_key" => $anti_phishing_key,
				"exter_invoke_ip"   => $exter_invoke_ip,
				"_input_charset"    => trim(strtolower($alipay_config['input_charset']))
		);

		//建立请求
		$alipaySubmit = new \AlipaySubmit($alipay_config);
		$html_text    = $alipaySubmit->buildRequestForm($parameter,"get", "确认");

		echo $html_text;
    }

    /**
     * 支付宝服务器异步通知页面
     */

    public function actionNotifyUrl()
    {
    	$this->enableCsrfValidation = false;
    	require_once('../../vendor/alipay/lib/alipay_core.function.php');
        require_once('../../vendor/alipay/lib/alipay_md5.function.php');
        require_once('../../vendor/alipay/lib/alipay_notify.class.php');
        require_once('../../vendor/alipay/lib/alipay_submit.class.php');

    	$alipay_config = Yii::$app->params['alipay']['alipay_config'];
var_dump($alipay_config);
		//计算得出通知验证结果
		$alipayNotify  = new \AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyNotify();
		file_put_contents('actionNotifyUrl.php','actionNotifyUrl');
		if($verify_result) {
			//验证成功
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//请在这里加上商户的业务逻辑程序代



			//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——

		    //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表

			//商户订单号

			$out_trade_no = $_POST['out_trade_no'];

			//支付宝交易号

			$trade_no     = $_POST['trade_no'];

			//交易状态
			$trade_status = $_POST['trade_status'];






		    if($_POST['trade_status'] == 'TRADE_FINISHED') {
				//判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//如果有做过处理，不执行商户的业务程序

				//注意：
				//该种交易状态只在两种情况下出现
				//1、开通了普通即时到账，买家付款成功后。
				//2、开通了高级即时到账，从该笔交易成功时间算起，过了签约时的可退款时限（如：三个月以内可退款、一年以内可退款等）后。

		        //调试用，写文本函数记录程序运行情况是否正常
		        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
		        //logResult($_POST['trade_status']);
		    }
		    else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
				//判断该笔订单是否在商户网站中已经做过处理
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//如果有做过处理，不执行商户的业务程序

				//注意：
				//该种交易状态只在一种情况下出现——开通了高级即时到账，买家付款成功后。

		        //调试用，写文本函数记录程序运行情况是否正常
		        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
		        //logResult($_POST['trade_status']);
		    }

			//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

			echo "success";		//请不要修改或删除

			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		}
		else {
		    //验证失败
		    echo "fail";

		    //调试用，写文本函数记录程序运行情况是否正常
		    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
    	}
	}

    /**
     * 支付宝页面跳转同步通知页面
     */
    public function actionReturnUrl()
    {
        require_once('../../vendor/alipay/lib/alipay_core.function.php');
        require_once('../../vendor/alipay/lib/alipay_md5.function.php');
        require_once('../../vendor/alipay/lib/alipay_notify.class.php');
        require_once('../../vendor/alipay/lib/alipay_submit.class.php');
		$alipay_config = Yii::$app->params['alipay']['alipay_config'];
		//计算得出通知验证结果
		$alipayNotify  = new \AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyReturn();
		if(!$verify_result) {
			//验证成功
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//请在这里加上商户的业务逻辑程序代码

			//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
		    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

			//商户订单号

			$out_trade_no = $_GET['out_trade_no'];

			//支付宝交易号

			$trade_no     = $_GET['trade_no'];

			//交易状态
			$trade_status = $_GET['trade_status'];

			//file_put_contents('aaaa.php',"a".$out_trade_no."b".$trade_no."c".$trade_status);
			//更改订单状态 
		//	$orders = new PayOrder;
var_dump($out_trade_no);
            $orders = PayOrder::sn($out_trade_no);
var_dump($orders);
            $orders->order_status = '4';
            $orders->order_pay_time = time();
            $orders->save(false);
            $user_id  = $orders->user_id;
            $coin = $orders->order_price;
            //判断购买的类型
			//if ($order->type=='course') {
            	$students = new Students;
                $student = $students -> Info($user_id);
                if ($student['stu_money'] < $coin) {
                    echo "数据异常购买失败，请于管理员联系1";die;
                }

                $students->stu_money = $student['stu_money'] + $coin;
                $re = $students->save();
                if (!$re) {
                    echo "数据异常购买失败，请于管理员联系2";
                }
                $Payment = new Payment;
                $Payment->user_id = $user_id;
                $Payment->payment_type = 1;
                $Payment->payment_addtime = time();
                $Payment->payment_money = $coin;
                $Payment->payment_note = '充值金币';
                $Payment->payment_way = 2;
                $res = $Payment -> save();
                print_r($Payment->getErrors());
                 if (!$res) {
                    echo "数据异常购买失败，请于管理员联系3";
                }
				/*//给用户添加课程
				$courses = CourseOrderInfo::find()->where("order_id=$order_id")->asArray()->all();
				foreach ($courses as $key => $course) {
					$result = UserCourse::AddCourse($user_id,$course['course_id']);
				}*/
			//}



		    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
				//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序
		    }
		    else {
		      echo "trade_status=".$_GET['trade_status'];
		    }

			echo "验证成功<br />";die;

			//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		}
		else {
		    //验证失败
		    //如要调试，请看alipay_notify.php页面的verifyReturn函数
		    echo "验证失败";
		}
    }
}
?>
