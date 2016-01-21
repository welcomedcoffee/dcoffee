<?php
namespace frontend\models\merchants;
use Yii;
use yii\db\ActiveRecord;

class Audit extends ActiveRecord
{
	/**
     * @inheritdoc   select table
     */
	public function tableName()
	{
		return '{{%audit}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return ;
    }
}