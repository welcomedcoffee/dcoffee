<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\consumption\Merchant;
use frontend\models\consumption\GoodsOrder;
/**
 * 消费商家
 */
class ConsumptionController extends BaseController
{
	//消费商家首页展示
    public function actionIndex()
    {
		$user_id = 1;
		$merchant = new Merchant;
		$base = $merchant->getMerchant($user_id);
		//if(empty($base)){
		//	echo 123;die;
		//}
        return $this->render('index',['data'=>$base]);
    }
	//对账单
	public function actionBill()
	{
		return $this->render('bill');
	}
	//我的订单
	public function actionOrder()
	{
		$order = new GoodsOrder;
		print_r($order);die;
		return $this->render('order');
	}
	//订单评论
	public function actionComment()
	{
		return $this->render('comment');
	}
	//基本资料
	public function actionBasedata()
	{
		return $this->render('basedata');
	}
	//账户安全
	public function actionSecurity()
	{
		return $this->render('security');
	}
	//账户余额
	public function actionLimoney()
	{
		return $this->render('limoney');
	}
}
