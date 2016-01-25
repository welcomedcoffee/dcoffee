<?php
namespace frontend\models\consumption;
use Yii;
use yii\db\ActiveRecord;
//商品订单表
class GoodsOrder extends ActiveRecord
{
	/**
     * @inheritdoc   select table
     */
	public static function tableName()
	{
		return '{{%goods_order}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return ;
    }
	//获取待处理退款订单
	public function getOrder($user_id,$status = '')
	{
		$endtime = strtotime(date('Y-m-d' ,strtotime('-2 month')));
		if(empty($status)){
			return $this->find()
				->where(['merchant_id'=>$user_id])
				->andWhere(['>','order_addtime',$endtime])
				->andWhere(['<','order_addtime',time()])
				->count();
		}else{
			return $this->find()
				->where(['and',['order_status'=>$status,'merchant_id'=>$user_id]])
				->andWhere(['>','order_addtime',$endtime])
				->andWhere(['<','order_addtime',time()])
				->count();
		}
	}
	//获取消费总额
	public function getAllmoney($user_id)
	{
		$endtime = strtotime(date('Y-m-d' ,strtotime('-2 month')));
		return $this->find()
			->where(['merchant_id'=>$user_id])
			->andWhere(['>','order_addtime',$endtime])
			->andWhere(['<','order_addtime',time()])
			->sum('order_amount');
	}
	//获取已完成订单信息
	public function getComplete($user_id,$pagination)
	{
		$endtime = strtotime(date('Y-m-d' ,strtotime('-2 month')));
		return $this->find()
			->offset($pagination->offset)
            ->limit($pagination->limit)
			->where(['and',['merchant_id'=>$user_id,'order_status'=>4]])
			->andWhere(['>','order_addtime',$endtime])
			->andWhere(['<','order_addtime',time()])
			->all();
	}
	//获取全部的订单消息
	public function getAllorder($user_id,$pagination,$ss='')
	{
		$endtime = strtotime(date('Y-m-d' ,strtotime('-2 month')));
		if(!empty($ss)){
			return $this->find()
					->offset($pagination->offset)
					->limit($pagination->limit)
				    ->where(['and',['merchant_id'=>$user_id,'order_sn'=>$ss]])
					->andWhere(['>','order_addtime',$endtime])
					->andWhere(['<','order_addtime',time()])
					->sll();
		}else{
			return $this->find()
					->offset($pagination->offset)
					->limit($pagination->limit)
				    ->where(['merchant_id'=>$user_id])
					->andWhere(['>','order_addtime',$endtime])
					->andWhere(['<','order_addtime',time()])
					->all();
		}
	}
}