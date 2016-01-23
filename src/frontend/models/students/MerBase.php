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
    /*
     * @inheritdoc 获取商圈信息
     */
    public function getMerInfo($pages)
    {
        return  MerBase::find()
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->asArray()->all();                   
    }
    /*
     * @inheritdoc 商家搜索数量
     */
    public function getCount($keywords)
    {
        return  MerBase::find()
                    ->where("ind_type=$keywords")
                    ->count();
    }
    /*
     * @inheritdoc 商家搜索
     */
    public function getSearchs($pages,$keywords)
    {
        return  MerBase::find()
                    ->where("ind_type=$keywords")
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->asArray()->all();
    }
    /*
     * @inheritdoc 获取商家详细信息
     */
    public function getDetail($mer_id)
    {
        return  MerBase::find()
                    ->where("mer_id=$mer_id")
                    ->asArray()->one();
    }
}