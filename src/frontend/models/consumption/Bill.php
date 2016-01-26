<?php
namespace frontend\models\consumption;
use Yii;
use yii\db\ActiveRecord;
//评论表
class Bill extends ActiveRecord
{
	/**
     * @inheritdoc   select table
     */
	public static function tableName()
	{
		return '{{%bill}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return ;
    }
	public function getBill($user_id)
	{
		return $this->find()
				->select(['bill_id','bill_date'])
				->where(['mer_id'=>$user_id])
				->orderBy('bill_id desc')
				->all();
	}
	//查询账单内容
	public function getBillList($bill_id)
	{
		return $this->find()
					->where(['bill_id'=>$bill_id])
					->one();
	}
	//
	public function getBillid()
	{
		return $this->find()
					->select(['bill_id'])
					->orderBy('bill_id desc')
					->one();
	}
}