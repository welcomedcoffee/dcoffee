<?php
namespace frontend\models\students;
use Yii;
use yii\db\ActiveRecord;

class MerType extends ActiveRecord
{
	/**
     * @inheritdoc   select table
     */
	public function tableName()
	{
		return '{{%mer_type}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return ;
    }
}