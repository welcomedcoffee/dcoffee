<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\consumption\Merchant;
use frontend\models\consumption\Comment;
use frontend\models\consumption\GoodsOrder;
use yii\data\Pagination;
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
		$order = new GoodsOrder;
		//待处理退款订单
		$goodsOrder['processed'] = $order->getOrder($user_id,5);
		//print_r($goodsOrder['processed']);die;
		//全部订单
		$goodsOrder['all'] = $order->getOrder($user_id);
		//完成订单
		$goodsOrder['complete'] = $order->getOrder($user_id,4);
		//取消订单
		$goodsOrder['cancel'] = $order->getOrder($user_id,2);
		//退款订单
		$goodsOrder['refund'] = $order->getOrder($user_id,3);
		//消费总额
		$goodsOrder['allmoney'] = $order->getAllmoney($user_id);
		//成功订单的详细信息
		$endtime = strtotime(date('Y-m-d' ,strtotime('-2 month')));
		$pagination = new Pagination([
            'defaultPageSize' => 1,
            'totalCount' => $order->find()->where(['and',['merchant_id'=>$user_id,'order_status'=>4]])->andWhere(['>','order_addtime',$endtime])
			->andWhere(['<','order_addtime',time()])->count(),
        ]);
		$orderlist = $order->getComplete($user_id,$pagination);
		//print_r($orderlist);die;
        return $this->render('index',['data'=>$base,'order'=>$goodsOrder,'pagination' => $pagination,'orderlist'=>$orderlist]);
    }
	//对账单
	public function actionBill()
	{
		
		return $this->render('bill');
	}
	//我的订单
	public function actionOrder()
	{
		$user_id = 1;
		$endtime = strtotime(date('Y-m-d' ,strtotime('-2 month')));
		@$ss=Yii::$app->request->get('ss');
		$order = new GoodsOrder;
		if(!empty($ss)){
			$pagination = new Pagination([
				'defaultPageSize' => 1,
				'totalCount' => $order->find()->where(['and',['merchant_id'=>$user_id,'order_sn'=>$ss]])->andWhere(['>','order_addtime',$endtime])
				->andWhere(['<','order_addtime',time()])->count(),
			]);
		}else{
			$pagination = new Pagination([
				'defaultPageSize' => 1,
				'totalCount' => $order->find()->where(['merchant_id'=>$user_id])->andWhere(['>','order_addtime',$endtime])
				->andWhere(['<','order_addtime',time()])->count(),
			]);
		}
		$orderlist = $order->getAllorder($user_id,$pagination,$ss);
		//print_R($orderlist);die;
		return $this->render('order',['orderlist'=>$orderlist,'pagination'=>$pagination]);
	}
	//订单评论
	public function actionComment()
	{
		$user_id = 1;
		$comment = new Comment;
		$pagination = new Pagination([
				'defaultPageSize' => 1,
				'totalCount' => $comment->find()->where(['and',['model_id'=>$user_id,'comment_type'=>1,'comment_status'=>1]])->count(),
			]);
		$commentlist = $comment->getComment($user_id,$pagination);
		return $this->render('comment',['comment'=>$commentlist,'pagination'=>$pagination]);
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
