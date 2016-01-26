<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\consumption\Merchant;
use frontend\models\consumption\Comment;
use frontend\models\consumption\GoodsOrder;
use frontend\models\consumption\Bill;
use frontend\models\consumption\Payment;
use common\components\CreateExcel;
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
	//充值页面
	public function actionChong()
	{
		return $this->render('chong');
	}
	//限额申请页面
	public function actionLimimoney()
	{
		return $this->render('limimoney');
	}
	//对账单
	public function actionBill()
	{
		$user_id = 1;
		@$bill_id = Yii::$app->request->get('bill_id');
		$bills = new Bill;
		$bill = $bills->getBill($user_id);
		if(empty($bill_id)){
			$bill_id = $bills->getBillid()->bill_id;
		}
		$bill_list = $bills->getBillList($bill_id);
		return $this->render('bill',['bill'=>$bill,'bill_id'=>$bill_id,'bill_list'=>$bill_list]);
	}
	//导出商家明细
	public function actionDownload()
	{
		$user_id = 1;
		$bill_cycle = Yii::$app->request->get('bill_cycle');
		$bill_cycle = explode('至',$bill_cycle);
		$start_time = $bill_cycle[0];
		$end_time = $bill_cycle[1];
		$pay = new Payment;
		$data=$pay->find()
			->select(['payment_type','payment_addtime','payment_money','payment_note','payment_way'])
			->where(['user_id'=>$user_id])
			->andWhere(['>','payment_addtime',strtotime($start_time)])
			->andWhere(['<','payment_addtime',strtotime($end_time)])
			->asArray()
			->all();
		if(empty($data)){
			$this->error('您要导出的数据不存在！', ['consumption/bill']);
		}else{
			foreach($data as $k=>$v){
				if($v['payment_type']==1){
					$data[$k]['payment_type'] = '支出';
				}else{
					$data[$k]['payment_type'] = '支入';
				}
				$data[$k]['payment_addtime'] = date('Y-m-d H:i:s',$v['payment_addtime']);
				if($v['payment_way']==1){
					$data[$k]['payment_way'] = '趣币';
				}else{
					$data[$k]['payment_way'] = '支付宝';
				}
			}
		}
		
		$excel = new CreateExcel();
		$excel->createByArray($data,'商家支入支出记录',['支入/支出','时间','金钱','备注','操作途径']);
	}
	//导出消费明细
	public function actionDownloads()
	{
		$user_id = 1;
		$bill_cycle = Yii::$app->request->get('bill_cycle');
		$bill_cycle = explode('至',$bill_cycle);
		$start_time = $bill_cycle[0];
		$end_time = $bill_cycle[1];
		$order = new GoodsOrder;
		$order = $order->find()
			->where(['and',['merchant_id'=>$user_id,'order_status'=>4]])
			->select(['order_sn','user_name','user_phone','order_amount','order_price','order_pay_time'])
			->andWhere(['>','order_pay_time',strtotime($start_time)])
			->andWhere(['<','order_pay_time',strtotime($end_time)])
			->asArray()
			->all();
		if(empty($order)){
			return $this->error('您要导出的数据不存在！', ['consumption/bill']);
		}
		foreach($order as $k=>$v){
			$order[$k]['order_pay_time'] = date('Y-m-d H:i:s',$v['order_pay_time']);
		}
		$excel = new CreateExcel();
		$excel->createByArray($order,'消费信息',['订单号','用户名','用户电话','实付金额','应付金额','支付时间']);
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
		return $this->render('order',['orderlist'=>$orderlist,'pagination'=>$pagination]);
	}
	//订单状态修改
	public function actionSaveorder()
	{
		$user_id = 1;
		$order_status = Yii::$app->request->get('order_status');
		if($order_status != 3 && $order_status != 6){
			 $this->error('订单状态异常', ['consumption/order']);
		}
		//$order = new GoodsOrder;
		$order = GoodsOrder::find()
			->where(['merchant_id'=>$user_id])
			->one();
		
		$order->order_status = $order_status;
		if($order->save() ){
			$this->success('订单状态修改成功',['consumption/order']);
		}else{
			$this->error('订单状态修改失败', ['consumption/order']);
		}
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
	//修改账户信息
	public function actionMerchantsave()
	{
		$type = Yii::$app->request->get('type','pwd');
        return $this->render('merchantsave',[
                        'type' => $type
        ]);
	}
	//账户余额
	public function actionLimoney()
	{
		return $this->render('limoney');
	}
}
