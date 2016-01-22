<?php
namespace frontend\models\user;
use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{
	/**
     * @inheritdoc   select table
     */
	public function tableName()
	{
		return '{{%user}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return ;
    }
}