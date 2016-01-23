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
}