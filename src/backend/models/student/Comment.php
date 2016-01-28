<?php

namespace backend\models\student;

use Yii;

/**
 * This is the model class for table "{{%fin_comment}}".
 *
 * @property integer $comment_id
 * @property integer $comment_type
 * @property integer $comment_level
 * @property string $comment_price
 * @property integer $model_id
 * @property integer $comment_addtime
 * @property integer $user_id
 * @property string $user_name
 * @property string $comment_content
 * @property integer $comment_status
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
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
        return [
            [['comment_id', 'comment_type', 'comment_level', 'model_id', 'comment_addtime', 'user_id'], 'integer'],
            [['comment_price'], 'number'],
            [['comment_content'], 'string'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'comment_type' => 'Comment Type',
            'comment_level' => 'Comment Level',
            'comment_price' => 'Comment Price',
            'model_id' => 'Model ID',
            'comment_addtime' => 'Comment Addtime',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'comment_content' => 'Comment Content',
            'comment_status' => 'Comment Status',
        ];
    }
}
