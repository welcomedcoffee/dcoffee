<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
/**
 * 消费商家
 */
class ConsumptionController extends BaseController
{
	//消费商家首页展示
    public function actionIndex()
    {
        return $this->render('index');
    }
	//我的订单
	public function actionOrder()
	{
		return $this->render('order');
	}
	//订单评论
	public function actionComment()
	{
		return $this->render('comment');
	}

}
