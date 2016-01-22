<?php
namespace frontend\models\students;
use Yii;
use yii\db\ActiveRecord;

class Circles extends ActiveRecord
{

	
	/**
     * @inheritdoc   select table
     */
	public static function tableName()
	{
		return '{{%part_type}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return ;
    }

    /*获取商圈信息*/
    public function getCircle()
    {
        return $this->find()->where('is_show=1')->asArray()->all();
    }
}