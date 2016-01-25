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
	//获取商家评论
	public function getComment($user_id,$pagination)
	{
		return $this->find()
					->offset($pagination->offset)
					->limit($pagination->limit)
					->where(['and',['model_id'=>$user_id,'comment_type'=>1,'comment_status'=>1]])
					->all();
	}
}