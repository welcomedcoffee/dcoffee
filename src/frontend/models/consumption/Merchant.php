<?php
namespace frontend\models\consumption;
use Yii;
//use yii\db\ActiveRecord;
//商家基本信息表
class Merchant extends \yii\db\ActiveRecord
{
	/**
     * @inheritdoc   select table
     */
	public static function tableName()
	{
		return '{{%merchant_base}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return [
			['mer_paypassword','string'],
			['mer_phone','integer']
		];
    }
	/*
	*	获取商家信息
	*/
	public function getMerchant($user_id)
	{
		return $this->find()->where(['mer_id'=>$user_id])->one();
	}
}