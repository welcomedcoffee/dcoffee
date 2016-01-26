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
            $order = PayOrder::find()->where("order_sn='56a74b5ce7e14'")->one();
            $order->order_status = '4';
            $order->order_pay_time = time();
            $order->save();
            $order_id = $order->order_id;
            $user_id  = $order->user_id;
            $coin = $order->order_price;

                $student = Students::find()->where("stu_id=$order->user_id")->one();
                if ($student->stu_money < $coin) {
                    echo "数据异常购买失败，请于管理员联系";die;
                }

                $student->stu_money = $student->stu_money + $coin;
                $re = $student->save();
                if (!$re) {
                    echo "数据异常购买失败，请于管理员联系";
                }
                $Payment = new Payment;
                $Payment->user_id = $user_id;
                $Payment->payment_type = 1;
                $Payment->payment_addtime = time();
                $Payment->payment_money = $coin;
                $Payment->payment_note = '充值金币';
                $Payment->payment_way = 2;
                $res = $Payment -> save();
                 if (!$res) {
                    echo "数据异常购买失败，请于管理员联系";
                }

            }

}
