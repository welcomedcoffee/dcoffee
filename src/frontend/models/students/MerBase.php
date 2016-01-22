<?php
namespace frontend\models\students;
use Yii;
use yii\db\ActiveRecord;

class MerBase extends ActiveRecord
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
        return ;
    }

    /*获取商圈信息*/
    public function getMerInfo()
    {
        return $this->find()->asArray()->all();
    }

    /*获取商家详细信息*/
    public function getDetail($mer_id)
    {
        return $this->find()->where("mer_id=$mer_id")->asArra()->one();
    }
}