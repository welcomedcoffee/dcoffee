<?php
namespace frontend\models\consumption;
use Yii;
use yii\db\ActiveRecord;
//评论表
class Payment extends ActiveRecord
{
	/**
     * @inheritdoc   select table
     */
	public static function tableName()
	{
		return '{{%payment}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return ;
    }
}