<?php
namespace frontend\models\consumption;
use Yii;
use yii\db\ActiveRecord;
//评论表
class Comment extends ActiveRecord
{
	/**
     * @inheritdoc   select table
     */
	public static function tableName()
	{
		return '{{%comment}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return ;
    }
}