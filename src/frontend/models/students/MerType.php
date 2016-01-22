<?php
namespace frontend\models\students;
use Yii;
use yii\db\ActiveRecord;

class MerType extends ActiveRecord
{

	
	/**
     * @inheritdoc   select table
     */
	public static function tableName()
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
    /*获取分类*/
    public function getType()
    {
    	return $this->find()->where('is_show=1')->asArray()->all();
    }
}