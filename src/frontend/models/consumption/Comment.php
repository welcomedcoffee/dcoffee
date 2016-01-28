<?php
namespace frontend\models\consumption;
use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;
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

	/*
	 * @inheritdoc 获取用户评论
	 */
	public function getUserComment($mer_id)
	{
		$cond = '1=1 and comment_status=1';
		if ($mer_id) {
			$cond .=" and model_id=$mer_id";
		}
		$pages     = new Pagination([
            'defaultPageSize'   => 1,
            'totalCount'        => $this->find()->where($cond)->count(),
        ]);
		$comment = Comment::find()
					->where($cond)
					->offset($pages->offset)
					->limit($pages->limit)
					->orderby('comment_addtime desc')
					->asArray()->all();
		$comment['pages'] = $pages;
		return $comment;			
	}
}