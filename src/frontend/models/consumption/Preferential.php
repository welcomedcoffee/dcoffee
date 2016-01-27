<?php
namespace frontend\models\consumption;
use Yii;
use yii\db\ActiveRecord;
//评论表
class Preferential extends ActiveRecord
{
	/**
     * @inheritdoc   select table
     */
	public static function tableName()
	{
		return '{{%preferential}}';
	}
	/**
     * @inheritdoc 
     */
    public function rules()
    {
        return [
			['preferential_type','required'],
			['preferential_content','required'],
			['preferential_start','required'],
			['preferential_end','required'],
			['merchant_id','integer'],
			['addtime','integer']
		];
    }
	public function attributeLabels()
	{
		return [
			'preferential_type'	=> '',
			'preferential_content' => '',
			'preferential_start' => '',
			'preferential_end' => ''
		];
	}
}