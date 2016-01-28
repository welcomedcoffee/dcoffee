<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
//use OSS;
use common\components\Oss;
use backend\models\student\PayOrder;
use backend\models\student\Students;
use backend\models\student\Payment;
/**
 * 关于我们
 */
class AaController extends BaseController
{
    public function actionIndex()
    {

    	//include "../../vendor/aliyuncs/oss-sdk-php/src/OSS/OssClient.php";
    	//$OSS = new \OSS\OssClient(Yii::$app->params['oss-config']['OSS_ACCESS_ID'], Yii::$app->params['oss-config']['OSS_ACCESS_KEY'],Yii::$app->params['oss-config']['OSS_ENDPOINT']);
        Oss::upload('images/1.jpg', '1.jpg',__FILE__);
        echo OSS::getUrl('images/1.jpg');die;
		//$file = $OSS->uploadFile('welcomedcoffee',"1.jpg", __FILE__);
    	//var_dump($file);DIE;
        return $this->render('index');
    }


 public function actionAa()
    {
        //更改订单状态
        $orders = PayOrder::sn('56a82aeab957e');
        $time = time();
        $order_id = $orders->order_id;
        $sql1 = "update fin_pay_order set order_status = '4',order_pay_time = '$time' where order_id = $order_id";
        $user_id  = $orders->user_id;
        $coin = $orders->order_price;
        //给用户添加金币
        $student = Students::findOne($user_id);
        $money = $student->stu_money + $coin;
        $stu_id = $student ->stu_id;
        $sql2 = "update fin_students set stu_money = '$money' where stu_id = '$stu_id'";
        //生成记录
        $sql3 = "insert into fin_payment(user_id,payment_type,payment_addtime,payment_money,payment_note,payment_way) values('$user_id','1','$time','$coin','充值金币','2')";
        $connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
            $connection->createCommand($sql1)->execute();
            $connection->createCommand($sql2)->execute();
            $connection->createCommand($sql3)->execute();
            $transaction->commit();
        } catch(Exception $e) {
            $transaction->rollBack();
            echo  $e->getMessage();
        }
            
    }

}
