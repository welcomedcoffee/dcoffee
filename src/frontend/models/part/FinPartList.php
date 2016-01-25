<?php

namespace app\models\part;

use Yii;

/**
 * This is the model class for table "{{%part_list}}".
 *
 * @property integer $part_id
 * @property integer $user_id
 * @property integer $job_id
 * @property integer $part_status
 * @property integer $add_time
 */
class FinPartList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%part_list}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'job_id', 'part_status', 'add_time'], 'required'],
            [['user_id', 'job_id', 'part_status', 'add_time'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'part_id' => 'Part ID',
            'user_id' => 'User ID',
            'job_id' => 'Job ID',
            'part_status' => 'Part Status',
            'add_time' => 'Add Time',
        ];
    }

    /**
     * 查询所有通过审核的用户
     */
    public function throughUser()
    {
        return self::find()
                ->select("count(user_id)")
                ->where(['part_status'=>1])
                ->groupBy("job_id")
                ->asArray()
                ->all();
    }
}
